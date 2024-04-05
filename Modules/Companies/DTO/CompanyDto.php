<?php

namespace Modules\Companies\DTO;


class CompanyDto
{
    public $name;
    public $name_ar;
    public $identifier_key;
    public $email;
    public $phone;
    public $max_debt;
    public $delegate_phone;
    public $delegate_name;
    public $printing_fees;
    public $tax_number;
    public $notes;
    public $user_id;
    
    public function __construct($request)
    {
        $this->user_id = $request->get('user_id');
        $this->name = $request->get('name');
        $this->name_ar = $request->get('name_ar');
        $this->identifier_key = $request->get('identifier_key');
        $this->email = $request->get('email');
        $this->phone = $request->get('phone');
        $this->max_debt = $request->get('max_debt');
        $this->delegate_phone = $request->get('delegate_phone');
        $this->delegate_name = $request->get('delegate_name');
        $this->printing_fees = $request->get('printing_fees');
        $this->tax_number = $request->get('tax_number');
        $this->notes = $request->get('notes');
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if ($data['max_debt'] == null) $data['max_debt'] =0;
        if ($data['printing_fees'] == null) $data['printing_fees'] =0;
        return $data;
    }

}
