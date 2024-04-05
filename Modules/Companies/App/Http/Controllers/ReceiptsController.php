<?php

namespace Modules\Companies\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Companies\DTO\ReceiptAmountDto;

use Modules\Common\Helper\UploaderHelper;
use App\Models\ReceiptAmount;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ReceiptsController extends Controller
{
   
    public function addReceipts( Request $request)
    {
      
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
        $Orders=Order::where('user_id',$main_id)->get();
        return view('companies::receipt.addReceipt',['Orders'=>$Orders]);
    }

    public function createReceipt(Request $request)
    {
        $data = $request->except('_token');
        $data = (new ReceiptAmountDto($request))->dataFromRequest();
        ReceiptAmount::create($data);
        return redirect("/admin/viewReceipts")->with('created','created');
    }

    public function viewReceipts(Request $request)
    {
      
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
        
        $query = ReceiptAmount::query();

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
        $ReceiptAmountData= $query->get();


      
        foreach($ReceiptAmountData as $key=>$value)
        {
            $ReceiptAmountData[$key]['user_name']= User::where('id',$main_id)->first()->name;
            $ReceiptAmountData[$key]['invoice']= Order::where('id',$value['order_id'])->first()->unique_order_id;
        }
    
        $fromDate=date('Y-m-d');
        $toDate=date('Y-m-d');

        $users=User::where(function ($query) use( $user_id,$main_id){
            $query->where('id', $user_id)
                    ->orWhere('owner_id', '=', $main_id)
                    ->orwhere('id',$main_id)
                    ->orwhere('owner_id', $user_id);
                      
            })->get();

        return view('companies::receipt.viewReceipt',['ReceiptAmountData'=>$ReceiptAmountData,'fromDate'=>$fromDate,'toDate'=>$toDate,'users'=>$users]);
    }

    public function edit($id)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
       
         $ReceiptAmount = ReceiptAmount::whereId($id)->first();
         $Orders=Order::where('user_id',$main_id)->get();
         return view('companies::receipt.editReceipt', compact('ReceiptAmount','Orders'));
    }

    public function update(Request $request)
    {
      
        $data = $request->except('_token');
        $validation = $this->validateUpdateClient($data, $request->id);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new ClientDto($request))->dataFromRequest();
        $admin = $this->ClientService->update($request->id, $data);
        return redirect('admin/clients')->with('updated', 'updated');
    }

    
    
}
