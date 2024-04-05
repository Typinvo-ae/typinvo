<?php


namespace Modules\Category\Validation;


trait CategoryValidation
{
    protected function validateStore($data){
        return validator($data,[
            'title'=>'required|max:191',
            // 'image'=>'required',
            'order'=>'required',
        ]);

    }

    protected function validateUpdate($data){
        return validator($data,[
            'title'=>'required|max:191',
            'order'=>'required',
        ]);

    }

}
