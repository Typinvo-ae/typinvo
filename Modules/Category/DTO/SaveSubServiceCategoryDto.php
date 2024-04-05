<?php


namespace Modules\Category\DTO;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Session;

class SaveSubServiceCategoryDto
{
    public $title;
    public $order;
    public $category_childs;
    public $department_id;
    public $government_price;
    public $printing_price;
    public $total;
    public $main;
    public function __construct($request)
    {
        
        $this->title = $request->get('title');
        $this->department_id = $request->get('department_id');
        $this->government_price = $request->get('government_price');
        $this->printing_price = $request->get('printing_price');
        $this->category_id = Session::get('category_id');
        $this->total = $request->get('total');
        $this->order = $request->get('order');
        $this->main = 1;
        $this->category_childs =$request->get('category_id');
        
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
