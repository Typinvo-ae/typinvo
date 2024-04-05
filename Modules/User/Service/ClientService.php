<?php


namespace Modules\User\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\MemberShipPermission;
use  App\Models\UserPermissions;
use App\Models\Permission;
use Modules\Common\Helper\UploaderHelper;
use  App\Models\RolePermission;


class ClientService
{
    use UploaderHelper;
    function findAll()
    {
        return User::whereRole('isUser')->Role()->get();
    }

    function UnCtiveUsers()
    {
        return User::whereIsActive(0)->get();
    }

    function findById($id)
    {
        return User::whereRole('isUser' )->find($id);
    }
    function active()
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
            $imageName = $this->upload($image, 'Client');
            $data['image'] = $imageName;
        }
       $userPermissions= $data['permissions'];
       unset($data['permissions']);
       User::create($data);
       return $this->saveUserPermissions($userPermissions,$data);
    }

    function update($id, $data)
    {
        $Client = $this->findById($id);
        if (request()->hasFile('image')) {
            File::delete(public_path('uploads/Client/' . $this->getImageName('Client', $Client->image)));
            $image = request()->file('image');
            $imageName = $this->upload($image, 'Client');
            $data['image'] = $imageName;
        }
      
        $userPermissions= $data['permissions'];
        unset($data['permissions']);
        $Client->update($data);
        return    $this->updateUserPermissions($userPermissions,$id,$data);
    }
    function saveUserPermissions($userPermissions,$data)
    {
        $userId=  User::orderby('id','desc')->first()->id;
        $RolePermissions=   RolePermission::where('role_id',$data['account_type'] )->where('user_id',auth()->user()->id)->get();
        foreach(  $RolePermissions as   $RolePermission)
        {
            RolePermission::create(array('permission_id'=>$RolePermission['permission_id'],'user_id'=>  $userId,'main_id'=>$userId,'role_id'=> $RolePermission['role_id']));
        }

    }
    function updateUserPermissions($userPermissions,$userId,$data)
    {
        RolePermission::where('user_id', $userId)->delete();
        foreach(  $userPermissions as   $userPermission)
        {
            RolePermission::create(array('permission_id'=>$userPermission,'user_id'=> $userId,'main_id'=>$userId,'role_id'=> $data['account_type']));
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
    function findAllPermission()
    {
        $OutOfRole=[2,3,4,7,8,9,10,21,22,23,25,26,28];
       
        return  Permission::whereNotIn('id', $OutOfRole)->get();
    }

    function UserPermissions($userId)
    {
        return   json_decode( RolePermission::where('user_id',$userId)->pluck('permission_id'),true);
       
    }
    
    

  
}
