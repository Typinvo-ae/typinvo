<?php

namespace Modules\Companies\DTO;

use Illuminate\Support\Facades\Auth;
use App\Models\ReceiptAmount;
use App\Models\payments;

class PaymentsDto
{
   
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
        
        $reference= @payments::where('user_id',$main_id)->orderby('id','desc')->first()->reference;

        if(! $reference)
        {
            $reference=1000;
        }else{
            $reference=$reference+1;
        }
        $this->reference =  $reference;
        $this->user_id =  $main_id;
        $this->main_id =  $main_id;

        $this->status =  1;
    
        $this->amount = $request->get('amount');
        $this->side_name = $request->get('side_name');
        $this->user_name = $request->get('user_name');
        $this->order_from = $request->get('order_from');
        $this->employee_id = $request->get('employee_id');
        $this->payment_type_id = $request->get('payment_type_id');
        $this->invoice_type = $request->get('invoice_type');
        $this->notes = $request->get('notes');
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
