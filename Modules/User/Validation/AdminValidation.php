<?php


namespace Modules\User\Validation;


trait AdminValidation
{
    protected function validateStoreAdmin($data)
    {
        return validator($data, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|min:5|unique:users,phone',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function validateUpdateAdmin($data, $id)
    {
        return validator($data, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);
    }

  
}
