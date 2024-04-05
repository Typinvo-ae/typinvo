<?php


namespace Modules\Category\DTO;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Session;
class UpdateServiceCategoryDto
{
    public $title;
    public $order;
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
        $this->total = $request->get('total');
        $this->main = 1;
        $this->category_id = Session::get('category_id');
        $this->order = $request->get('order');
    
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
