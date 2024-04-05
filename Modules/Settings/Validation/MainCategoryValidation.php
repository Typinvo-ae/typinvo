<?php


namespace Modules\Settings\Validation;


trait MainCategoryValidation
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
