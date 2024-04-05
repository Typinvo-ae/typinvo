<?php


namespace Modules\MemberShip\DTO;


class MemberShipDto
{

    public $name;

    public function __construct($request)
    {
        $this->name = $request->get('name');
    }

    public function dataFromRequest()
    {
        return  json_decode(json_encode($this), true);
       
    }

}
