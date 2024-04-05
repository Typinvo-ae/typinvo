<?php


namespace Modules\User\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use  App\Models\MemberShipPermission;
use App\Models\User;
use App\Models\UserPermissions;
use App\Models\Permission;
use App\Models\RolePermission;
use Modules\Common\Helper\UploaderHelper;

class AdminService
{
    use UploaderHelper;
    function findAll()
    {
        return User::whereRole('isAdmin')->get();
    }

    function UnCtiveUsers($role)
    {
        return User::whereIsActive(0)->get();
    }

    function findById($id)
    {
        return User::find($id);
    }
    function active($role)
    {
        return User::whereIsActive(1)->get();
    }
    function findBy($key, $value)
    {
        return User::where($key, $value)->get();
    }
    function save($data)
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = uploadImage( request()->file('image'),'user');
            $data['image'] = $imageName;
        }
       User::create($data);
    return    $this->saveUserPermissions($data);
   
    }

    function saveUserPermissions($data)
    {
      $userId=  User::orderby('id','desc')->first()->id;
      $Permissions=    Permission::pluck('id');
      foreach(  $Permissions as   $Permission)
      {
        RolePermission::create(array('permission_id'=>$Permission,'role_id'=>1,'user_id'=> $userId,'main_id'=> $userId));
      }
    }

    
    function updateUserPermissions($data,$userId)
    {
        UserPermissions::where('user_id', $userId)->delete();
        $MemberShipPermissions=    MemberShipPermission::where( 'membership_id',$data['membership_id'])->pluck('permission_id');
        foreach(  $MemberShipPermissions as   $MemberShipPermission)
        {
            UserPermissions::create(array('permission_id'=>$MemberShipPermission,'user_id'=> $userId));
        }
    }

    function update($id, $data)
    {
        $Client = $this->findById($id);
        if (request()->hasFile('image')) {
            File::delete(public_path('uploads/Client/' . $this->getImageName('Client', $Client->image)));
            $image = request()->file('image');
            $imageName =uploadImage( request()->file('image'),'user');
            $data['image'] = $imageName;
        }
        $Client->update($data);
    //   return    $this->updateUserDataPermissions($data,$id);
    }
    function updateUserDataPermissions($data,$userId)
    {
        RolePermission::where('user_id', $userId)->delete();
        $Permissions=    Permission::pluck('id');
        foreach(  $Permissions as   $Permission)
        {
          RolePermission::create(array('permission_id'=>$Permission,'role_id'=>1,'user_id'=> $userId,'main_id'=> $userId));
        }
    }
    function updateUnactive($unactive)
    {
        foreach ($unactive as $value) :
            User::whereId($value)->update(array('is_active' => 1));
        endforeach;
    }
    function activate($id)
    {
        $Client = $this->findById($id);
        $Client->is_active = !$Client->is_active;
        $Client->save();
    }
    function delete($id)
    {
        $Client = $this->findById($id);
        File::delete(public_path('uploads/Client/' . $this->getImageName('Client', $Client->image)));
        $Client->delete();
    }

  
}
