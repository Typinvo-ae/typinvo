<?php

namespace Modules\Companies\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Companies\DTO\PaymentsDto;
use Modules\Common\Helper\UploaderHelper;
use App\Models\ReceiptAmount;
use App\Models\User;
use App\Models\Payments;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Entities\PaymentType;


class PaymentsController extends Controller
{
    public function addPayments( Request $request)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
        $employees=User::where(function ($query) use( $user_id,$main_id){
        $query->where('id', $user_id)
        ->orWhere('owner_id', '=', $main_id)
        ->orwhere('id',$main_id)
        ->orwhere('owner_id', $user_id);
        })->where('owner_id', '!=',0)->get();

         $PaymentTypes = PaymentType::whereUserId($main_id )->get();

        return view('companies::payments.addPayments',['employees'=>$employees,'PaymentTypes'=>$PaymentTypes]);
    }

    public function createPayments(Request $request)
    {
      
        $data = $request->except('_token');
         $data = (new PaymentsDto($request))->dataFromRequest();
         Payments::create($data);
        return redirect("/admin/viewPayments")->with('created','created');
    }



    public function viewPayments(Request $request)
    {
      
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
      
        $query = payments::query();

        $query =   $query->where('user_id', '=', $main_id);

        // Filter by status (active or expired)
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date)
                    ->whereDate('created_at', '<=',$request->to_date);
        }else{
            $query->whereDate('created_at', '=', date('Y-m-d'));
        }

        if ($request->filled('search_date')) {
            $query->whereDate('created_at', '=', $request->search_date);
        }
    
        if ($request->filled('employee_id')) {
            $query->where('user_id', '=',  $request->employee_id );
          }
         $paymentsData= $query->get();


      
        foreach($paymentsData as $key=>$value)
        {
            $paymentsData[$key]['user_name']= User::where('id',$main_id)->first()->name;
            $paymentsData[$key]['employee_name']= User::where('id',$value['employee_id'])->first()->name;
        }
    
        $fromDate=date('Y-m-d');
        $toDate=date('Y-m-d');

        $users=User::where(function ($query) use( $user_id,$main_id){
            $query->where('id', $user_id)
                ->orWhere('owner_id', '=', $main_id)
                ->orwhere('id',$main_id)
                ->orwhere('owner_id', $user_id);
                      
            })->get();


        return view('companies::payments.viewPayments',['paymentsData'=>$paymentsData,'fromDate'=>$fromDate,'toDate'=>$toDate,'users'=>$users]);
    }

    public function confirmPayment($transId,Request $request)
    {
        payments::whereId($transId)->update(array('status'=>2));
        return redirect()->back()->with('confirmed', 'confirmed');
    
    }
    
  
    
    
}
