<?php

namespace Modules\Companies\DTO;

use Illuminate\Support\Facades\Auth;

class CompanyTransactionsDto
{
    public $company_id;
    public $status;
    public $amount;
    public $user_name;
    public $notes;
    public $order_from;
    public $side_name;
    public $user_id;
    public $main_id;
    
    public function __construct($request)
    {

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
        
        $this->user_id =  $user_id;
        $this->main_id =   $main_id;

        $this->company_id = $request->get('company_id');
        $this->status = 1;
        $this->amount = $request->get('amount');
        $this->user_name = $request->get('user_name');
        $this->notes = $request->get('notes');
        $this->order_from = $request->get('order_from');
        $this->side_name = $request->get('side_name');

   
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
