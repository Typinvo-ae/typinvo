<?php


namespace Modules\Settings\Validation;


trait PaymentTypeValidation
{
    protected function validateStore($data){
        return validator($data,[
            'name'=>'required',
        ]);

    }

    protected function validateUpdate($data){
        return validator($data,[
            'name'=>'required',
        ]);

    }

}
