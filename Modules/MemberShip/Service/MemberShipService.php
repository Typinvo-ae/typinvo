<?php
namespace Modules\MemberShip\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\MemberShip\Entities\MemberShip;
use  App\Models\MemberShipPermission;
use  App\Models\Permission;
use Modules\Common\Helper\UploaderHelper;

class MemberShipService
{
    use UploaderHelper;
    function findAll()
    {
       
        $MemberShips= MemberShip::where('id',1)->orderby('id','asc')->get();
        foreach( $MemberShips as  $key=>$MemberShip)
        {
            $MemberShipPermissionIds=  MemberShipPermission::where('membership_id',$MemberShip->id)->pluck('permission_id');
            $MemberShips[$key]['permission']=   Permission::wherein('id',$MemberShipPermissionIds)->select('name_ar')->get();
        }
        return $MemberShips;
    }
    function findById($id)
    {
        return MemberShip::find($id);
    }
   
    function findBy($key, $value)
    {
        return MemberShip::where($key, $value)->get();
    }

    function update($id, $data)
    {
        $MemberShip = $this->findById($id);
        $MemberShip->update($data);
        return $MemberShip;
    }
 

  
}
