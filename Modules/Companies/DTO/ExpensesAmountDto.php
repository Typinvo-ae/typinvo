<?php

namespace Modules\Companies\DTO;

use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;

class ExpensesAmountDto
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
        
        $reference= @Expenses::where('user_id',$main_id)->orderby('id','desc')->first()->reference;

        if(! $reference)
        {
            $reference=1000;
        }else{
            $reference=$reference+1;
        }
        $this->reference =  $reference;
        $this->user_id =  $main_id;
    
        $this->title = $request->get('title');
        $this->supply_company = $request->get('supply_company');
        $this->amount_without_tax = $request->get('amount_without_tax');
        $this->supply_company_tax = $request->get('supply_company_tax');
        $this->tax = $request->get('tax');
        $this->supply_company_phone = $request->get('supply_company_phone');
        $this->total_amount = $request->get('total_amount');
        $this->notes = $request->get('notes');
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return $data;
    }

}
