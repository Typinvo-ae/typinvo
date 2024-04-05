<?php


namespace Modules\Settings\DTO;


class PaymentTypeDto
{
    public $name;
    public $user_id;
    public function __construct($request)
    {
        $this->name = $request->get('name');
        $this->user_id = $request->get('user_id');
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
