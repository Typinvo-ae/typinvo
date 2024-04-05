<?php


namespace Modules\Settings\DTO;


class MainCategoryDto
{
    public $name;
    public $user_id;
    public $order;
    public $tax;
    public $image;
    public function __construct($request)
    {
        $this->name = $request->get('name');
        $this->user_id = $request->get('user_id');
        $this->order = $request->get('order');
        $this->tax = $request->get('tax');
        if ($request->hasFile('image')) $this->image   = $request->file('image');
        
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if ($data['image'] == null) unset($data['image']);
        return $data;
    }

}
