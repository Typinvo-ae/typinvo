<?php


namespace Modules\Category\DTO;
use Illuminate\Support\Facades\Session;

class CardCategoryDto
{
    public $title;
    public $order;
    public $department_id;
    public $category_type;
    public $image;
    public function __construct($request)
    {
        $this->category_type = $request->get('category_type');
        $this->title = $request->get('title');
        $this->order = $request->get('order');
        $this->department_id = $request->get('department_id');
        $this->category_id = Session::get('category_id');
        
        if ($request->hasFile('image')) $this->image   = $request->file('image');
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if ($data['image'] == null) unset($data['image']);
        return $data;
    }

}
