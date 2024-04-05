<?php

namespace Modules\Companies\DTO;

use Illuminate\Support\Facades\Auth;
use App\Models\ReceiptAmount;

class ReceiptAmountDto
{
    public $user_id;
    public $order_id;
    public $price;
    public $notes;
    public $amount_received;
    public $amount_remain;
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
        
        $reference= @ReceiptAmount::where('user_id',$main_id)->orderby('id','desc')->first()->reference;

        if(! $reference)
        {
            $reference=1000;
        }else{
            $reference=$reference+1;
        }
        $this->reference =  $reference;
        $this->user_id =  $main_id;
        $this->order_id = $request->get('order_id');
        $this->title = $request->get('title');
        $this->price = $request->get('price');
        $this->notes = $request->get('notes');
        $this->amount_received = $request->get('amount_received');
        $this->amount_remain = $request->get('amount_remain');
   
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
