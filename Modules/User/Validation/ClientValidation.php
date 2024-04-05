<?php


namespace Modules\User\Validation;


trait ClientValidation
{
    protected function validateStoreClient($data)
    {
        return validator($data, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function validateUpdateClient($data, $id)
    {
        return validator($data, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);
    }

  
}
