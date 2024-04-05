<?php

namespace Modules\Companies\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Companies\DTO\ExpensesAmountDto;
use Modules\Common\Helper\UploaderHelper;
use App\Models\ReceiptAmount;
use App\Models\User;
use App\Models\Expenses;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
   
    public function addExpenses( Request $request)
    {
      
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
      
        return view('companies::expense.addExpenses');
    }

    public function createExpenses(Request $request)
    {
        $data = $request->except('_token');
        $data = (new ExpensesAmountDto($request))->dataFromRequest();
        Expenses::create($data);
        return redirect("/admin/viewExpenses")->with('created','created');
    }

    // public function viewExpenses(Request $request)
    // {
    //     if( Auth::user()->role=='isAdmin')
    //     {
    //         $user_id=Auth::user()->id;
    //         $main_id=Auth::user()->id;
    //     }else{
    //         $user_id=Auth::user()->id;
    //         $main_id=Auth::user()->owner_id;
    //     }
    //     $ExpensesData=  Expenses::where('user_id',$main_id)->get();
    //     foreach($ExpensesData as $key=>$value)
    //     {
    //         $ExpensesData[$key]['user_name']= User::where('id',$main_id)->first()->name;
          
    //     }
    //     return view('companies::expense.viewExpenses',['ExpensesData'=>$ExpensesData]);
    // }

    public function viewExpenses(Request $request)
    {
      
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }
        
        $query = Expenses::query();

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
        $ExpensesData= $query->get();

        foreach($ExpensesData as $key=>$value)
        {
            $ExpensesData[$key]['user_name']= User::where('id',$main_id)->first()->name;
        }
    
        $fromDate=date('Y-m-d');
        $toDate=date('Y-m-d');

        $users=User::where(function ($query) use( $user_id,$main_id){
            $query->where('id', $user_id)
                    ->orWhere('owner_id', '=', $main_id)
                    ->orwhere('id',$main_id)
                    ->orwhere('owner_id', $user_id);
                      
            })->get();

        return view('companies::expense.viewExpenses',['ExpensesData'=>$ExpensesData,'fromDate'=>$fromDate,'toDate'=>$toDate,'users'=>$users]);
    }


    
    
}
