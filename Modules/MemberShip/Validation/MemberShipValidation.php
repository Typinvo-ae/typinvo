<?php


namespace Modules\MemberShip\Validation;


trait MemberShipValidation
{
    protected function validateStoreMemberShip($data)
    {
        return validator($data, [
            'name' => 'required',
      
        ]);
    }

    protected function validateUpdateMemberShip($data, $id)
    {
        return validator($data, [
            'name' => 'required',
        ]);
    }

  
}
