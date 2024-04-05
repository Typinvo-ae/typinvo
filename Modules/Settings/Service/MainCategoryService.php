<?php


namespace Modules\Settings\Service;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Settings\Entities\MainCategory;
use Modules\Category\Entities\Category;
use Modules\Common\Helper\UploaderHelper;
use Illuminate\Support\Facades\Auth;

class MainCategoryService
{
    use UploaderHelper;
    function findAll(){
       $MainCatgeories=  MainCategory::where('visible',1)->whereUserId(auth()->user()->id)->orderby('order','asc')->get();
     
       foreach($MainCatgeories as  $key=>$MainCatgeory  )
       {
        $MainCatgeories[$key]['count']=Category::where('department_id',$MainCatgeory['id'])->count();
       }
       return    $MainCatgeories;

    }

    function userCompanies(){

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        return  Company::whereUserId($main_id)->where('visible',1)->get();
 
     }

    function findSubCategory(){
        $MainCatgeories=  MainCategory::where(function ($query) {
            $query->whereUserId(auth()->user()->id)
                  ->orWhere('user_id', '=', auth()->user()->owner_id);
        })
        ->where('visible',1)->orderby('order','asc')->get();
      
        foreach($MainCatgeories as  $key=>$MainCatgeory  )
        {
         $MainCatgeories[$key]['count']=Category::where('category_id',$MainCatgeory['id'])->where('visible',1)->where('main','!=','0')->count();
         $MainCatgeories[$key]['hasNoBranch']=Category::where('department_id',$MainCatgeory['id'])->where('visible',1)->where('category_type','=','0')->count('category_childs');
         $MainCatgeories[$key]['checkSubCat']=Category::where('category_id',$MainCatgeory['id'])->where('visible',1)->count();
        }
        return    $MainCatgeories;
 
     }
  
    function findById($id){
        return MainCategory::findOrFail($id);
    }

    function findBy($key, $value)
    {
        return MainCategory::where($key, $value)->get();
    }

    function save($data){
        if (request()->hasFile('image'))
        $data['image'] = $this->upload(request()->file('image'), 'MainCategory');

        return MainCategory::create($data);
    }
    function update($id,$data){
        $MainCategory = $this->findById($id);
        if (request()->hasFile('image')) {
            File::delete(public_path('uploads/MainCategory/' . $this->getImageName('MainCategory', $MainCategory->image)));
            $data['image'] = $this->upload(request()->file('image'), 'MainCategory');
        }
        $MainCategory->update($data);
        return $MainCategory;
    }



}
