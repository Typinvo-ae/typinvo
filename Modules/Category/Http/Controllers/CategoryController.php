<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\DTO\SaveServiceCategoryDto;
use Modules\Category\DTO\UpdateServiceCategoryDto;
use Modules\Category\DTO\CardCategoryDto;
use Modules\Category\DTO\SubCardCategoryDto;
use Modules\Category\DTO\UpdateSubServiceCategoryDto;
use Modules\Category\DTO\SaveSubServiceCategoryDto;
use Modules\Category\Entities\Category;
use Modules\Settings\Entities\MainCategory;
use Modules\Category\Service\CategoryService;
use Modules\Category\Validation\CategoryValidation;
use Modules\Category\ViewModel\CategoryViewModel;
use Modules\Common\Helper\UploaderHelper;
use Modules\Country\Service\CityService;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    use UploaderHelper,CategoryValidation;
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request,$id)
    {

       $viewModelCategories=  (new CategoryViewModel)->categoriesPaginated($id,$request->category_id,$request->service_name);
       $categories= $this->categoryService->catgory_with_childs_names($id,$viewModelCategories);
        session()->put('department_id', $id);
        session()->put('category_id', $id);
        $MainCategory=MainCategory::whereId($id)->where('visible', '=',1)->first();
         $checkButtons=$this->checkButtonsDepartment($id);
        return view('category::categories.index',['mainCategories'=>$checkButtons['mainCategories'],'categories' => $categories,'categoryTypecheck1'=>$checkButtons['categoryTypecheck1']
        ,'categoryTypecheck2'=>$checkButtons['categoryTypecheck2'],'departmentId'=>$id,'request' => $request,'MainCategory' => $MainCategory]);
   
    }
    
   public function checkButtonsDepartment($id)
   {
       $categoryType=Category::where('category_id',$id)->where('visible', '=',1)->first();
       $categoryTypecheck1='true';   $categoryTypecheck2='true';  $mainCategories=[];
       if( !empty($categoryType))
       {
          if(@$categoryType->category_type==1)
         {
           
            $categoryTypecheck2='false';  
             $mainCategories=Category::where('department_id',$id)->where('category_type',1)->where('visible', '=',1)->get();
          }
        if(@$categoryType->category_type==0 )
            $categoryTypecheck1='false'; 
       
       }
       return ['categoryTypecheck2'=>$categoryTypecheck2,'categoryTypecheck1'=>$categoryTypecheck1,'mainCategories'=>$mainCategories];
   }
 

    /****card category start */
    public function createCardCategory()
    {
        $departmentId= Session::get('department_id');
        $viewModel = new CategoryViewModel;
        $LastCategory=LastCategory();
        return view('category::categories.createCardCategory',compact('viewModel','departmentId','LastCategory'));
    }
    public function saveCardCategory(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
          $data = (new CardCategoryDto($request))->dataFromRequest();
        $category = $this->categoryService->saveCardCategory($data);
        $departmentId= $request->department_id;
        return redirect("/admin/allcategories/$departmentId")->with('created','created');
    }

    public function editCardCategory($id)
    {
        $departmentId= Session::get('department_id');
        $category = $this->categoryService->findById($id);
        $viewModel = new CategoryViewModel;
        return view('category::categories.editCardCategory',compact('category','viewModel','departmentId'));
    }


    public function updateCardCategory(Request $request)
    {
        $departmentId= Session::get('department_id');
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new CardCategoryDto($request))->dataFromRequest();
          $this->categoryService->updateCardCategory($request->id,$data);
        return redirect("/admin/allcategories/$departmentId")->with('updated','updated');
    }

    public function deleteCardCategory(Request $request,$id)
    {
        $departmentId= Session::get('department_id');
        Category::whereId($id)->update(['visible'=>0]);
        return redirect("/admin/allcategories/$departmentId")->with('deleted','deleted');
     }
    /****card category end  */
    /****sub category start */
    public function viewSubDataCategory(Request $request,$id)
    {
         $categories=category::where('department_id',$id)->where('visible', 1)->get();
         session()->put('department_id', $id);
         $departmentId=Category::whereId($id)->first()->department_id;
         $MainCategory=Maincategory::whereId($departmentId)->first();

         $viewModelCategories=  Category::findOrFail($id);
         $objectCatgoryChildsNames=Category::wherein('id',json_decode($viewModelCategories['category_childs'],true))->where('visible', 1)->select('id','title')->get();
        
     
        foreach($objectCatgoryChildsNames as $key=>$value)
        {
            $objectCatgoryChildsNames[$key]['department_id']=@category::where('id',$id)->first()->department_id;
        }
        $checkButtons=$this->checkButtons($id);
        
      
       return view('category::sub_catgories.viewSubDataCategory',['mainCategories'=>$checkButtons['mainCategories'],'categories' => $categories,'categoryTypecheck1'=>$checkButtons['categoryTypecheck1']
       ,'categoryTypecheck2'=>$checkButtons['categoryTypecheck2'],'departmentId'=>$id,'request' => $request,'MainCategory'=>$MainCategory,'objectCatgoryChildsNames'=>$objectCatgoryChildsNames]);
  
      
    }
    public function createSubCardCategory()
    {
        $departmentId= Session::get('department_id');
         $categoryChilds=  Category::where('id', $departmentId)->first()->category_childs;
        $viewModel = new CategoryViewModel;
        $LastCategory=LastCategory();
       return view('category::sub_catgories.createSubCardCategory',compact('viewModel','departmentId','categoryChilds','LastCategory'));
    }
    public function saveSubCardCategory(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
         $data = (new SubCardCategoryDto($request))->dataFromRequest();
        $category = $this->categoryService->saveSubCardCategory($data);
        $departmentId= $request->department_id;
        return redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('created','created');
    }

    public function editSubCardCategory($id)
    {
        $departmentId= Session::get('department_id');
        $category = $this->categoryService->findById($id);
        $viewModel = new CategoryViewModel;
        return view('category::sub_catgories.editSubCardCategory',compact('category','viewModel','departmentId'));
    }


    public function updateSubCardCategory(Request $request)
    {
        $departmentId= Session::get('department_id');
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new CardCategoryDto($request))->dataFromRequest();
         $this->categoryService->updateCardCategory($request->id,$data);
        return redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('updated','updated');
    }

    public function deleteSubCardCategory(Request $request,$id)
    {
        $departmentId= Session::get('department_id');
        Category::whereId($id)->update(['visible'=>0]);
        return redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('deleted','deleted');
     }

    public function createSubServiceCategory()
    {
        $departmentId= Session::get('department_id');
        $viewModelCategories=  (new CategoryViewModel)->categories( $departmentId);
        $categoryChilds=  Category::where('id', $departmentId)->first()->category_childs;
        $LastCategory=LastCategory();
        return view('category::sub_catgories.createSubServiceCategory',compact('departmentId','categoryChilds','LastCategory'));
    }
    public function saveSubServiceCategory(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
              $data = (new SaveSubServiceCategoryDto($request))->dataFromRequest();
        $category = $this->categoryService->saveSubServiceCategory($data);
        $departmentId= $request->department_id;
        return redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('created','created');
    }
    public function editSubServiceCategory($id)
    {
        $departmentId= Session::get('department_id');
        $viewModelCategories=  (new CategoryViewModel)->categories($departmentId);
        $category = $this->categoryService->findById($id);
        return view('category::sub_catgories.editSubServiceCategory',compact('category','departmentId'));
    }
    public function updateSubServiceCategory(Request $request)
    {
        $departmentId= Session::get('department_id');
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
         $data = (new UpdateSubServiceCategoryDto($request))->dataFromRequest();
          $this->categoryService->updateSubServiceCategory($request->id,$data,$request->category_childs);
        return redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('updated','updated');
    }

    public function deleteSubServiceCategory(Request $request,$id)
    {
    
         $departmentId= Session::get('department_id');
        Category::whereId($id)->update(['visible'=>0]);
        return   redirect("/admin/categories/viewSubDataCategory/$departmentId")->with('updated','updated');
     }
    /****sub category end  */
   /****service category start */
    public function createServiceCategory()
    {
        $departmentId= Session::get('department_id');
        $viewModelCategories=  (new CategoryViewModel)->categories( $departmentId);
         $catgoryWithChildsNames= $this->categoryService->catgory_with_childs_names($departmentId,$viewModelCategories);
         $LastCategory=LastCategory();
         return view('category::categories.createServiceCategory',compact('catgoryWithChildsNames','departmentId','LastCategory'));
    }
    public function saveServiceCategory(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
              $data = (new SaveServiceCategoryDto($request))->dataFromRequest();
        $category = $this->categoryService->saveServiceCategory($data);
        $departmentId= $request->department_id;
        return redirect("/admin/allcategories/$departmentId")->with('created','created');
    }
    public function editServiceCategory($id)
    {
        $departmentId= Session::get('department_id');
        $viewModelCategories=  (new CategoryViewModel)->categories($departmentId);
        $category = $this->categoryService->findById($id);
        return view('category::categories.editServiceCategory',compact('category','departmentId'));
    }
    public function updateServiceCategory(Request $request)
    {
        $departmentId= Session::get('department_id');
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
         $data = (new UpdateServiceCategoryDto($request))->dataFromRequest();
          $this->categoryService->updateServiceCategory($request->id,$data,$request->category_childs);
        return redirect("/admin/allcategories/$departmentId")->with('updated','updated');
    }

    public function deleteServiceCategory(Request $request,$id)
    {
        $departmentId= Session::get('department_id');
        Category::whereId($id)->update(['visible'=>0]);
        return redirect("/admin/allcategories/$departmentId")->with('deleted','deleted');
     }
   /****service category end */




   public function checkButtons($id)
   {
       $categoryType=Category::where('department_id',$id)->where('visible', '=',1)->first();
       $categoryTypecheck1='true';   $categoryTypecheck2='true';  $mainCategories=[];
       if( !empty($categoryType))
       {
          if(@$categoryType->category_type==1)
          {
            $categoryTypecheck2='false';  
             $mainCategories=Category::where('department_id',$id)->where('category_type',1)->where('visible', '=',1)->get();
          }
          if(@$categoryType->category_type==0 )
            $categoryTypecheck1='false'; 
           
       }
       return ['categoryTypecheck2'=>$categoryTypecheck2,'categoryTypecheck1'=>$categoryTypecheck1,'mainCategories'=>$mainCategories];
   }
 

   
  
}
