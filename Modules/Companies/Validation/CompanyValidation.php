<?php


namespace Modules\Companies\Validation;


trait CompanyValidation
{
    protected function validateStoreCompany($data)
    {
        return validator($data, [
            'name' => 'required',
            'email' => 'required',
         
        ]);
    }

    protected function validateUpdateCompany($data, $id)
    {
        return validator($data, [
            'name' => 'required',
           
        ]);
    }

  
}
