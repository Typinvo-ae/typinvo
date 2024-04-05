<?php


namespace Modules\Category\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Category\Entities\Category;
use Modules\Common\Helper\UploaderHelper;

class CategoryService
{
    use UploaderHelper;
    function findAll($relation=[]){
        return Category::where('visible', '=',1)->with($relation)->get();

    }
    function active($categoryId){
        return Category::active()->where('visible', '=',1)->whereHas('mainCategory' , function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->where('department_id', $categoryId)
        ->get();
    }
    function sub_categories($categoryId){
        return Category::active()->where('visible', '=',1)->whereHas('mainCategory' , function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->where('department_id', $categoryId)
        ->where('main', '!=',0)
        ->get();
    }
    function activePaginated($id,$categoryId,$serviceName){
        return Category::active()->where('visible', '=',1)->whereHas('mainCategory' , function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->where('department_id', $id)
        ->when(!empty($categoryId),function($query)use($categoryId)
        {
            $query->where('id', $categoryId);
        })
        ->when(!empty($serviceName),function($query)use($serviceName)
        {
            $query->where('title', 'like', '%' . $serviceName . '%');
        })
        ->paginate(20);
    }
    function subPaginated($id,$categoryId,$serviceName){
        return Category::active()->where('visible', '=',1)->whereHas('mainCategory' , function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->where('department_id', $id)
        ->when(!empty($categoryId),function($query)use($categoryId)
        {
            $query->where('id', $categoryId);
        })
        ->when(!empty($serviceName),function($query)use($serviceName)
        {
            $query->where('title', 'like', '%' . $serviceName . '%');
        })
        ->where('main', '!=',0)
        ->paginate(20);
    }

    function findById($id){
        return Category::findOrFail($id);
    }

    function findBy($key, $value,$relation=[])
    {
        return Category::where($key, $value)->with($relation)->get();
    }

  
    function catgoryChildsById($id)
    {
        $viewModelCategories=  Category::findOrFail($id);
        if($viewModelCategories['main']!=0)
        {
            $objectCatgoryChildsNames=Category::wherein('id',json_decode($viewModelCategories['category_childs'],true))->select('title')->pluck('title')->toArray();
            $viewModelCategories['all_title']=implode(' / ', $objectCatgoryChildsNames);
            $viewModelCategories['type']='فرعى';
        }else{
            $viewModelCategories['all_title']=$viewModelCategories['title'];
            $viewModelCategories['type']='رئيسى';
        }
        return $viewModelCategories;
    }
  
     function catgory_with_childs_names( $departmentId,$viewModelCategories)
    {
        foreach($viewModelCategories as $key=>$value)
        {
            if($value['main']!=0)
            {
            //   $objectCatgoryChildsNames=Category::where('department_id', $departmentId)->wherein('id',json_decode($value['category_childs'],true))->select('title')->pluck('title')->toArray();
             //  $viewModelCategories[$key]['all_title']=implode(' / ', $objectCatgoryChildsNames);
               $viewModelCategories[$key]['type']='فرعى';
            }else{
                $viewModelCategories[$key]['all_title']=$value['title'];
                $viewModelCategories[$key]['type']='رئيسى';
            }
        }
        return $viewModelCategories;
    }

    function sub_catgory_with_childs_names( $departmentId,$viewModelCategories)
    {
        foreach($viewModelCategories as $key=>$value)
        {
            $objectCatgoryChildsNames=[];
             //  $objectCatgoryChildsNames=Category::where('department_id', $departmentId)->wherein('id',json_decode($value['category_childs'],true))->select('title')->pluck('title')->toArray();
               $viewModelCategories[$key]['all_title']=implode(' / ', $objectCatgoryChildsNames).'/('.$value['total'].' '.'درهم'.')';
         
           
        }
        return $viewModelCategories;
    }
  
    function saveCardCategory($data){

        if (request()->hasFile('image'))
        $data['image'] = $this->upload(request()->file('image'), 'Category');


        Category::create($data);
        $CategoryId=Category::orderby('id','desc')->first()->id; 
        $categoryChildsArray[] = "$CategoryId";
        Category::whereId($CategoryId)->update(array('category_childs'=> json_encode($categoryChildsArray)));
   }
   function saveSubCardCategory($data){
        if (request()->hasFile('image'))
        $data['image'] = $this->upload(request()->file('image'), 'Category');

        
        Category::create($data);
        $CategoryId=Category::orderby('id','desc')->first()->id; 
        $categoryChildsArray = Category::orderBy('id', 'desc')->first()->category_childs;
        $categoryChildsArray = json_decode($categoryChildsArray, true); 
        $categoryChildsArray[] = "$CategoryId";
        Category::whereId($CategoryId)->update(array('category_childs'=> $categoryChildsArray));
    }
   
   function updateCardCategory($id,$data){
       $Category = $this->findById($id);

       if (request()->hasFile('image')) {
        File::delete(public_path('uploads/Category/' . $this->getImageName('Category', $Category->image)));
         $data['image'] = $this->upload(request()->file('image'), 'Category');
        }

       $Category->update($data);
   }


    function  saveServiceCategory($data){

        if (request()->hasFile('image'))
        $data['image'] = $this->upload(request()->file('image'), 'Category');

        Category::create($data);

        $CategoryId=Category::orderby('id','desc')->first()->id; 
        $categoryChildsArray = Category::orderBy('id', 'desc')->first()->category_childs;
        $categoryChildsArray = json_decode($categoryChildsArray, true); 
        $categoryChildsArray[] = "$CategoryId";
        Category::whereId($CategoryId)->update(array('category_childs'=> $categoryChildsArray));

        
    }

    function updateServiceCategory($id,$data,$categoryChilds){
   
        $Category = $this->findById($id);

        if (request()->hasFile('image')) {
            File::delete(public_path('uploads/Category/' . $this->getImageName('Category', $Category->image)));
            $data['image'] = $this->upload(request()->file('image'), 'Category');
        }

        $Category->update($data);
        return $Category;
    }

    function  saveSubServiceCategory($data){

        Category::create($data);
        $CategoryId=Category::orderby('id','desc')->first()->id; 
        $categoryChildsArray = Category::orderBy('id', 'desc')->first()->category_childs;
        $categoryChildsArray = json_decode($categoryChildsArray, true); 
        $categoryChildsArray[] = "$CategoryId";
        Category::whereId($CategoryId)->update(array('category_childs'=> $categoryChildsArray));

    }

    function updateSubServiceCategory($id,$data,$categoryChilds){
   
        $Category = $this->findById($id);
        $Category->update($data);
       
        return $Category;
    }

}
