<?php

namespace Modules\Settings\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $Roles=[1=>'ادمن',2=>'موظف',3=>'محاسب'];
        return view('settings::Permission.index',['Roles'=>$Roles]);
    }
    public function edit($id)
    {
       $paymentType = $this->PaymentTypeService->findById($id);
        $userId=auth()->user()->id ;
        return view('settings::paymentType.edit',compact('paymentType','userId'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new PaymentTypeDto($request))->dataFromRequest();
        $this->PaymentTypeService->update($id,$data);
        return redirect('admin/paymentType')->with('updated','updated');
    }

   
    public function getEditPermissions(Request $request, $id)
    {
         
        $OutOfRole=[2,3,4,7,8,9,10,21,22,23,25,26,28];
         if($id==1)
         {
        //   $cat_permissions = Permission::all()->groupBy('category');
        $cat_permissionsData = Permission::orderby('order_data','asc')->get();
        $cat_permissions=    $cat_permissionsData->groupBy('category');
        $rolePermissions =  RolePermission::where('role_id',$id)->where('user_id',auth()->user()->id)->pluck('permission_id')->toArray();
         $role="ادمن";
         }elseif($id==2)
         {
          
            $cat_permissionsData = Permission::orderby('order_data','asc')->whereNotIn('id', $OutOfRole)->get();
            $cat_permissions=    $cat_permissionsData->groupBy('category');
            $rolePermissions =  RolePermission::where('role_id',$id)->where('user_id',auth()->user()->id)->pluck('permission_id')->toArray();
            $role="موظف";

         }elseif($id==3){

            $cat_permissionsData = Permission::orderby('order_data','asc')->whereNotIn('id', $OutOfRole)->get();
            $cat_permissions=    $cat_permissionsData->groupBy('category');
            $rolePermissions =  RolePermission::where('role_id',$id)->where('user_id',auth()->user()->id)->pluck('permission_id')->toArray();
            $role="محاسب";

         }

         return view('settings::Permission.edit',['cat_permissions' => $cat_permissions,'role'=>$role,'role_id'=>$id,'rolePermissions'=>$rolePermissions]);
    }


    public function updatePermission(Request $request)
    { 

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        if(empty($request->permissions))
        {
            return redirect()->back();
        }else{

              $RolePermission=    RolePermission::where('role_id',$request->role_id)->where('main_id',$main_id)->groupBy('user_id')->pluck('user_id');
         
             RolePermission::where('role_id',$request->role_id)->where('main_id',$main_id)->delete();
            foreach( $RolePermission as $key=>$value)
            {
                
                foreach($request->permissions as $permission)
                {
                   RolePermission::create(array('permission_id'=>$permission,'role_id'=>$request->role_id,'user_id'=>$value,'main_id'=>$main_id));
                }
            }
         
            return redirect('admin/clients')->with('updated','updated');
       
        }
   

    }
     
}
