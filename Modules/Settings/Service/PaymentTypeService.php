<?php


namespace Modules\Settings\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Settings\Entities\PaymentType;
use Modules\Common\Helper\UploaderHelper;

class PaymentTypeService
{
    use UploaderHelper;
    function findAll(){
        return PaymentType::whereUserId(auth()->user()->id)->get();

    }


    function findById($id){
        return PaymentType::findOrFail($id);
    }

    function findBy($key, $value)
    {
        return PaymentType::where($key, $value)->get();
    }

    function save($data){
        return PaymentType::create($data);
    }

    function update($id,$data){
        $Category = $this->findById($id);
        $Category->update($data);
        return $Category;
    }



}
