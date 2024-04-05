<?php

namespace Modules\Settings\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\DTO\MainCategoryDto;
use Modules\Settings\Service\MainCategoryService;
use Modules\Settings\Validation\MainCategoryValidation;
use Modules\Settings\Entities\MainCategory;
use App\Models\Company;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;

class MainCategoryController extends Controller
{
  use MainCategoryValidation;
    private $MainCategory;
    public function __construct(MainCategoryService $MainCategoryService)
    {
        $this->MainCategoryService = $MainCategoryService;
    }
    public function index(Request $request)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        $MainCatgeories=  MainCategory::where(function ($query)use($user_id,$main_id) {
            $query->whereUserId($user_id)
                  ->orWhere('user_id', '=', $main_id);
        })
        ->where('visible',1)->orderby('order','asc')->get();
   
        foreach($MainCatgeories as  $key=>$MainCatgeory  )
        {
            $MainCatgeories[$key]['count']=Category::where('department_id',$MainCatgeory['id'])->count();
        }
   
        return view('settings::mainCategory.index',['mainCategories' => $MainCatgeories]);
    }
    public function invoiceMainCategory(Request $request)
    {
    
        $mainCategories = $this->MainCategoryService->findSubCategory();
        return view('settings::invoiceMainCategory.index',['mainCategories' => $mainCategories]);
    }

    public function companyCategory($companyId)
    {
        
         $mainCategories = $this->MainCategoryService->findSubCategory();
        return view('settings::invoiceMainCompanies.invoiceCompanyCategory',['mainCategories' => $mainCategories,'companyId'=>$companyId]);
    }

    public function dashboard()
    {
     
        if(checkUserCartType()=='noCart' or checkUserCart()=='cartTrack')
        {
            return view('settings::dashboard.index');
        }
        elseif(checkUserCartType()=='company')
        {
            return redirect()->route('admin.currentCompanyInvoice');
     
        }elseif(checkUserCartType()=='normal')
        {
            return redirect()->route('admin.currentInvoice');
        }else{
            return view('settings::dashboard.index');
        }
       
    }


    public function mainCompanies(Request $request)
    {
         $mainCompanies = $this->MainCategoryService->userCompanies();
        return view('settings::invoiceMainCompanies.index',['mainCompanies' => $mainCompanies]);
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
         return view('settings::mainCategory.create',['LastMainCategory'=>LastMainCategory()]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
          $data = (new MainCategoryDto($request))->dataFromRequest();
         $this->MainCategoryService->save($data);
        return redirect('/admin/mainCategory')->with('created','created');
    }
    public function edit($id)
    {
        $mainCategory = $this->MainCategoryService->findById($id);
        return view('settings::mainCategory.edit',compact('mainCategory'));
    }
    public function update(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new MainCategoryDto($request))->dataFromRequest();
        $this->MainCategoryService->update($request->id,$data);
        return redirect('admin/mainCategory')->with('updated','updated');
    }

    public function delete(Request $request,$id)
    {
        MainCategory::whereId($id)->update(['visible'=>0]);
        return redirect('admin/mainCategory')->with('deleted','deleted');
    }

    
}
