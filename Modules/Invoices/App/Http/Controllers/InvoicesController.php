<?php

namespace Modules\Invoices\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderServices;
use Modules\Category\Entities\Category;
use Modules\Settings\Entities\MainCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Models\ManageInvoice;
use App\Models\Company;
class InvoicesController extends Controller
{
    //printInvoice
    public function printInvoice(Request $request,$id)
    {
        return view('invoices::print.index');

    }
    public function index(Request $request)
    {

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        $query = Order::query();

        
        if( Gate::check('Invoice_View_All') ) {
            
            $query = $query->with('subData')->where(function ($query ) use($user_id,$main_id){
            $query->where('user_id', '=', $user_id)
                    ->orWhere('main_id', '=',  $main_id);
                });
        }
        else
        {
            $query = $query->with('subData')->where(function ($query )use($user_id) {
                $query->where('user_id', '=', $user_id);
                    });
        }
     

        // Search by name or code
        if ($request->filled('invoice')) {
            $query->where(function ($q) use ($request) {
                $q->where('unique_order_id', 'like', '%' . $request->invoice . '%');
                    
            });
        }
        // Filter by status (active or expired)
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date)
                    ->whereDate('created_at', '<=',$request->to_date);
        }else{
            $query->whereDate('created_at', '=', date('Y-m-d'));
        }
    
      if ($request->filled('employee_id')) {
        $query->where('user_id', '=',  $request->employee_id );

        
        }
        $Orders= $query->get();

        foreach($Orders as $key=>$value)
        {
            $Orders[$key]['government_price']=OrderServices::where('order_id',$value['id'])->sum('government_price');
            $Orders[$key]['printing_price']=OrderServices::where('order_id',$value['id'])->sum('printing_price');
            $Orders[$key]['tax']=OrderServices::where('order_id',$value['id'])->sum('tax');
            $Orders[$key]['created_date']= date("Y-m-d", strtotime($value->created_at) );
            $Orders[$key]['user_name']= User::where('id',$value['user_id'])->first()->name;
           
        }
      
    
         $fromDate=date('Y-m-d');
         $toDate=date('Y-m-d');

          $users=User::where(function ($query) use( $user_id,$main_id){
            $query->where('id', $user_id)
                  ->orWhere('owner_id', '=', $main_id)
                  ->orwhere('id',$main_id)
                  ->orwhere('owner_id', $user_id);
                  
        })->get();

        return view('invoices::invoice.index', ['Orders' => $Orders,'fromDate'=>$fromDate,'toDate'=>$toDate,'users'=>$users]);
    }
    public function InvoicePayment(Request $request)
    {
       return 'InvoicePayment';
    }
        
    public function orderInvoice($id)
    {
        $orderDetails=  Order::where('id',$id)->first();
            
        $Totaldiscount=0; $TotalgovernmentPrice=0;
        $TotalprintingPrice=0;$TotalTax=0;$TotalAmount=0;
        $discountInvisible=0;
        $totalDiscountInvisible=0;
        $totalQty=0;$totalTaxamount=0;
        foreach( $orderDetails['SubData'] as $key=>$orderService)
        {
    
        $orderDetails['SubData'][$key]['total']=$orderService['government_price']+$orderService['printing_price'];
        $categoryId=    Category::whereId($orderService['service_id'])->first()->category_id;
        $category=Category::where('id',$orderService['service_id'])->where('category_type',0)->first();
        $mainCategoryTax=MainCategory::where('id',  $categoryId)->first()->tax;
    
            $objectCatgoryData=Category::wherein('id',json_decode($category['category_childs'],true))->select('title')->pluck('title')->toArray();
        $orderDetails['SubData'][$key]['all_title']=$category['title'];

        if($orderService['discount_invisible']==1)
        {
            $totalDiscountInvisible+=$orderService['discount'];
            $Totaldiscount+=0;
            $discountInvisible+=0;
            $currentorderServices[$key]['discountInvisible']=$orderService['discount'];
            $currentorderServices[$key]['discount']=0;
        }else{
            $totalDiscountInvisible+=0;
            $Totaldiscount+=$orderService['discount'];
            $discountInvisible+=0;
            $currentorderServices[$key]['discountInvisible']='';
        }
        $currentorderServices[$key]['subTotalWithoutTax']=$orderService['government_price']+$orderService['printing_price']-$orderService['discount'];
        
        $TotalgovernmentPrice+=$orderService['government_price'];
        $TotalprintingPrice+=  $orderService['printing_price'];
        
        $TotalAmount+=$orderService['government_price']+$orderService['printing_price'];

        $totalTaxamount+=  ( (($orderService['government_price']+$orderService['printing_price']-$orderService['discount']) * $mainCategoryTax)/100);
        $totalQty+=$orderService['qty'];
        }
        $subTotalWithoutTax=$TotalAmount-$Totaldiscount;

        $totalTaxAmount=$this->filterPriceData($totalTaxamount);

        $subTotal=$subTotalWithoutTax+ $totalTaxAmount;

        return ['Totaldiscount'=>$Totaldiscount,'TotalAmount'=>$TotalAmount,'orderDetails' => $orderDetails,'countServices'=>count($orderDetails['SubData']),
        'TotalgovernmentPrice'=>$TotalgovernmentPrice,'TotalprintingPrice'=>$TotalprintingPrice,'TotalTax'=>$TotalTax , 'subTotal'=>$subTotal,'discountInvisible'=>$discountInvisible
            ,'subTotalWithoutTax'=>$subTotalWithoutTax,'totalDiscountInvisible'=>$totalDiscountInvisible,'totalQty'=>$totalQty,'totalTaxAmount'=>$totalTaxAmount
    ];
    }


  
    public function printUserInvoice(Request $request,$id)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        $UserDetails=   User::where('id',$main_id)->first();
        $orderDetails=  Order::where('id',$id)->first();
        $dateTimeString = $orderDetails['created_at'];
        $carbonDate = Carbon::parse($dateTimeString);
        $created_at = $carbonDate->toDateString();

        if($orderDetails['all_paid'] ==0 &&  $orderDetails['total_paid']!=0)
         {
            $orderDetails['payType']='مدفوع جزئى ';

            $orderDetails['pay_type_id']=1;
         }
        elseif($orderDetails['all_paid'] ==0 &&  $orderDetails['total_paid']==0 )
        {
            $orderDetails['payType']=' غير مدفوع';

            $orderDetails['pay_type_id']=2;
        }
        else
        {
            $orderDetails['payType']='مدفوعة ';

            $orderDetails['pay_type_id']=3;
        }
        

    
        $Invoice= $this->orderInvoice($id);

        $SubInvoices=[];
        if($orderDetails['order_current_main']!=0)
        {
           $SubInvoices=   Order::where('order_main','=', $orderDetails['order_main'])->where('id','!=',$orderDetails['id'])->get();
        }

        $ManageInvoice = ManageInvoice::whereUserId($main_id )->first();

        return view('invoices::print.printUserInvoice',['created_at'=>$created_at,'UserDetails'=>$UserDetails,'mainOrderDetails'=>$orderDetails,'Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
            'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
            ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount'],'SubInvoices'=>$SubInvoices,'ManageInvoice'=>$ManageInvoice
        ]);
    }
    public function printCompanyInvoice(Request $request,$id)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

        $UserDetails=   User::where('id',$main_id)->first();
        $orderDetails=  Order::where('id',$id)->first();
        $dateTimeString = $orderDetails['created_at'];
        $carbonDate = Carbon::parse($dateTimeString);
        $created_at = $carbonDate->toDateString();

        if($orderDetails['all_paid'] ==0 &&  $orderDetails['total_paid']!=0)
         {
            $orderDetails['payType']='مدفوع جزئى ';

            $orderDetails['pay_type_id']=1;
         }
        elseif($orderDetails['all_paid'] ==0 &&  $orderDetails['total_paid']==0 )
        {
            $orderDetails['payType']=' غير مدفوع';

            $orderDetails['pay_type_id']=2;
        }
        else
        {
            $orderDetails['payType']='مدفوعة ';

            $orderDetails['pay_type_id']=3;
        }
        

    
        $Invoice= $this->orderInvoice($id);

        $SubInvoices=[];
        if($orderDetails['order_current_main']!=0)
        {
           $SubInvoices=   Order::where('order_main','=', $orderDetails['order_main'])->where('id','!=',$orderDetails['id'])->get();
        }
        $ManageInvoice = ManageInvoice::whereUserId($main_id )->first();
        $companyId=Order::whereId($id)->first()->company_id;
        $Company=   Company::whereId( $companyId)->first();

        return view('invoices::print.printCompanyInvoice',['created_at'=>$created_at,'UserDetails'=>$UserDetails,'mainOrderDetails'=>$orderDetails,'Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
            'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
            ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount'],'SubInvoices'=>$SubInvoices,'ManageInvoice'=>$ManageInvoice,'Company'=>$Company
        ]);
    }

    public function userInvoice(Request $request,$id)
    {
         $orderDetails=  Order::where('id',$id)->first();
        
        $Invoice= $this->orderInvoice($id);

        $SubInvoices=[];
        if($orderDetails['order_current_main']!=0)
        {
           $SubInvoices=   Order::where('order_main','=', $orderDetails['order_main'])->where('id','!=',$orderDetails['id'])->get();
        }

       
        return view('invoices::invoice.userInvoice',['Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
            'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
            ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount'],'SubInvoices'=>$SubInvoices,'order_id'=>$id
        ]);
    }
    public function companyInvoice(Request $request,$id)
    {
        $orderDetails=  Order::where('id',$id)->first();
            
          $Invoice= $this->orderInvoice($id);
       

          $SubInvoices=[];
          if($orderDetails['order_current_main']!=0)
          {
             $SubInvoices=   Order::where('order_main','=', $orderDetails['order_main'])->where('id','!=',$orderDetails['id'])->get();
          }

       return view('invoices::invoice.companyInvoice',['Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
           'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
            ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount'],'SubInvoices'=>$SubInvoices,'order_id'=>$id
       ]);
    }
    public function editUserInvoice(Request $request,$id)
    {
     
      $orderDetails=  Order::where('id',$id)->first();
      $Invoice= $this->orderInvoice($id);
     return view('invoices::invoice.userInvoice',['Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
         'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
          ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount']
     ]);
    }
    
    public function editCompanyInvoice(Request $request,$id)
    {
      $orderDetails=  Order::where('id',$id)->first();
      $Invoice= $this->orderInvoice($id);
      $company_id= $orderDetails['company_id'];
      $countData=count($orderDetails['SubData']);
     
       return view('invoices::invoice.editCompanyInvoice',['Totaldiscount'=>$Invoice['Totaldiscount'],'TotalAmount'=>$Invoice['TotalAmount'],'orderDetails' => $Invoice['orderDetails'],'countServices'=>count($orderDetails['SubData']),
         'TotalgovernmentPrice'=>$Invoice['TotalgovernmentPrice'],'TotalprintingPrice'=>$Invoice['TotalprintingPrice'],'TotalTax'=>$Invoice['TotalTax'] , 'subTotal'=>$Invoice['subTotal'],'discountInvisible'=>$Invoice['discountInvisible']
          ,'subTotalWithoutTax'=>$Invoice['subTotalWithoutTax'],'totalDiscountInvisible'=>$Invoice['totalDiscountInvisible'],'totalQty'=>$Invoice['totalQty'],'totalTaxAmount'=>$Invoice['totalTaxAmount'],'countData'=>$countData,'order_id'=>$id,'company_id'=>$company_id
         ]);
    }
  
    function filterPriceData($rate)
    {
        try {
            $mystring = $rate;
            $arr = explode(".", $mystring);
            $first = $arr[0] . '.' . substr($arr[1], 0, 2);;
            $all = $first;
        } catch (\Exception $e) {
            $all = $rate . '.00';
        }
        return $all;
    }
    public function updateCompanyInvoice(Request $request)
    {

        $MainOrder=Order::with('subData')->where('id', $request->order_id)->first();

        if(empty($request->totalWithTaxHidden))
        {
             $MainOrder['subtotal']=$MainOrder['subtotal'];
        }else{
            $MainOrder['subtotal']=$request->totalWithTaxHidden;
        }
        
        if(empty($request->totalTaxHidden))
        {
            $MainOrder['total_tax']=$MainOrder['total_tax'];
        }else{
            $MainOrder['total_tax']=$request->totalTaxHidden;
        }
        foreach( $MainOrder['subData'] as $key=>$value)
        {
            $MainOrder['subData'][$key]['qty']=$request['totalCount'][$key];
            $MainOrder['subData'][$key]['discount']=$request['totalDiscount'][$key];

            if(@$request['invisibleDiscount'][$key])
            {
                $MainOrder['subData'][$key]['discount_invisible']=$request['invisibleDiscount'][$key];
            }
        }
    
        if(empty($request->total_paid))
        {
            $totalRemain=0;
        }else{
            $totalRemain=$request->subTotal-$request->total_paid;
        }
        if(empty($request->all_paid))
        $request->all_paid=0;
          
        if(empty($request->all_paid) && empty($request->total_paid))
        $totalRemain=$request->subTotal;

      
        Order::create(
            array('user_id'=>Auth::user()->id,'order_type'=>1,
            'tax_number'=>$MainOrder->tax_number,'user_name'=>$MainOrder->user_name,'total_tax'=>$MainOrder->total_tax,
            'subtotal'=>$MainOrder->subtotal,'total_discount'=>$MainOrder->total_discount,'total_discount_invisible'=>$MainOrder->total_discount_invisible,
            'total_paid'=>$MainOrder->total_paid,'total_remain'=>0,'order_current_main'=>$MainOrder->id,'order_main'=>$MainOrder->order_main,'all_paid'=>$request->all_paid,'notes'=>$request->notes,'company_id'=>$request->company_id
        ));

      $currentOrder= Order::orderby('id','desc')->first();

      $companyName = substr(@User::where('id', $main_id)->first()->company_name, 5);
      if(empty($companyName ))
      {
          $companyName ='dalycom';
      }
      $unique_order_id= $companyName.'-'.$currentOrder['id'];
      Order::where('id',$currentOrder['id'])->update(array('unique_order_id'=> $unique_order_id));


    $MainOrder= json_decode($MainOrder ,true);

 
      foreach($MainOrder['sub_data'] as $key=>$value)
      {
       
        OrderServices::create(
            array(
                'order_id'=> $currentOrder['id'],'service_id'=>$value['service_id'] ,'qty'=>$value['qty'] 
                ,'government_price'=>$value['government_price']  ,'printing_price'=>$value['printing_price'] 
                ,'discount'=>$value['discount'] ,'discount_invisible'=>$value['discount_invisible'] 
                ,'tax'=>$value['tax'] ,'total_without_tax'=> $value['total_without_tax'] 
            )
        );

      }

   
      return redirect()->route('admin.allInvoices');
    }
    
}
