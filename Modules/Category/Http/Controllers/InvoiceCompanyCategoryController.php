<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\DTO\MasterCategoryDto;
use Modules\Category\DTO\SaveSubCategoryDto;
use Modules\Category\DTO\UpdateSubCategoryDto;
use Modules\Category\Entities\Category;
use Modules\Category\Service\CategoryService;
use Modules\Category\Validation\CategoryValidation;
use Modules\Category\ViewModel\CategoryViewModel;
use Modules\Common\Helper\UploaderHelper;
use Modules\Country\Service\CityService;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Order;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Modules\Settings\Entities\MainCategory;
use App\Models\OrderServices;

class InvoiceCompanyCategoryController extends Controller
{
    use UploaderHelper,CategoryValidation;
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function viewControlSubCategory($categoryId,$companyId)
    {
     
         $AllCategory=  Category::where('category_type',1)->where('department_id',$categoryId)->where('visible',1)->get();
        foreach($AllCategory as $key=>$value)
        {
             $checkCurrentCategory='card';
             $checkCategory=Category::where('department_id',$value['id'])->first();
             if( @$checkCategory->category_type==0)
             {
                $checkCurrentCategory='service';
             }
             $subCount=Category::where('department_id',$value['id'])->where('visible',1)->count();

            $AllCategory[$key]['checkCategory']=$checkCurrentCategory;
            $AllCategory[$key]['subCount']=$subCount;
        }
       

       $viewModelCategories=  Category::whereId($categoryId)->first();
       $objectCatgoryChildsNames=[];
       if( $viewModelCategories)
       {
        $objectCatgoryChildsNames=Category::wherein('id',json_decode($viewModelCategories['category_childs'],true))->where('visible', 1)->select('id','department_id','title')->get();
       }


       return view('category::proccessSubCategories.index',['AllCategory'=>$AllCategory,'companyId'=>$companyId,'objectCatgoryChildsNames'=>$objectCatgoryChildsNames]);
    }

    public function index(Request $request,$id,$companyId)
    {
        session()->put('department_id', $id);
        session()->put('company_id', $companyId);
        $categoryId=$request->category_id;

        $categories=Category::where('department_id',$id)->where('visible',1)->where('category_type',0)->get();

        $MainCategory=MainCategory::where('id',$id)->first();
      
        $viewModelCategories=  Category::whereId($id)->first();

        if($viewModelCategories)
        {
            $objectCatgoryChildsNames=Category::wherein('id',json_decode($viewModelCategories['category_childs'],true))->where('visible', 1)->select('id','department_id','title')->get();
        }else{
            $objectCatgoryChildsNames=[];
        }

       return view('category::companyCategories.index',['MainCategory'=>$MainCategory,'categories' => $categories,'departmentId'=>$id,'request' => $request,'companyId'=>$companyId,'objectCatgoryChildsNames'=>$objectCatgoryChildsNames]);
    }

   public function payWithCompanyAccount(Request $request)
   {
    $companyId= Session::get('company_id');
    Cart::whereUserId(auth()->user()->id)->where('company_id',$companyId)->update(array('pay_with_company_account'=>1,'pay_count'=>1));
   return Cart::whereUserId(auth()->user()->id)->first();
   }
    public function addServiceToCompanyCart(Request $request)
    {
   
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

     

        if( Auth::user()->role=='isAdmin')
        {
            $cartCheck=Cart::where('user_id',$user_id)->where('company_id',$request->company_id)->first();
        }else{
            $cartCheck=Cart::where('main_id',$main_id)->where('company_id',$request->company_id)->first();
        }

        if($cartCheck)
        {
            CartItems::create(
                array('cart_id'=>$cartCheck->id,'service_id'=>$request->item_id,'qty'=>$request->totalCount,
                'discount_invisible'=>$request->invisibleDiscount, 'discount'=>$request->discount  
            ));
        }else{

            Cart::create(array('user_id'=>$user_id,'main_id'=>$main_id,'company_id'=>$request->company_id));

            $cart=Cart::orderby('id','desc')->first();

            CartItems::create(
                array('cart_id'=>$cart->id,'service_id'=>$request->item_id,'qty'=>$request->totalCount,
                'discount_invisible'=>$request->invisibleDiscount, 'discount'=>$request->discount  
            ));

        }
        $cartCheck=Cart::where('user_id',Auth::user()->id)->first();
        return $cartCheck->id ;
    }
 
   
    public function currentCompanyInvoice(Request $request)
    {
        $companyId= Session::get('company_id');
        $CurrentCompany=Company::whereId( $companyId)->first();
        $currentUser= User::whereId(auth()->user()->id )->first();
        $currentCart=Cart::whereUserId(auth()->user()->id)->where('company_id',$companyId)->first();
        $currentCartItems=   CartItems::with('Service','Service.mainCategory')->whereCartId(@$currentCart->id)->get();

         $Totaldiscount=0; $TotalgovernmentPrice=0;
         $TotalprintingPrice=0;$TotalTax=0;$TotalAmount=0;
         $discountInvisible=0;
         $totalDiscountInvisible=0;
         $totalQty=0;$totalTaxamount=0;
          foreach( $currentCartItems as $key=>$cartItem)
          {
            $departmentId= $cartItem['service']['department_id'];
            $category=Category::where('department_id',$departmentId)->where('category_type',0)->first();
           
            $objectCatgoryData=Category::wherein('id',json_decode($category['category_childs'],true))->select('title')->pluck('title')->toArray();
            $currentCartItems[$key]['all_title']=implode(' / ', $objectCatgoryData);

            if($cartItem['discount_invisible']==1)
            {
                $totalDiscountInvisible+=$cartItem['discount'];
                $Totaldiscount+=0;
                $discountInvisible+=0;
                $currentCartItems[$key]['discountInvisible']=$cartItem['discount'];
                $currentCartItems[$key]['discount']=0;
            }else{
                $totalDiscountInvisible+=0;
                $Totaldiscount+=$cartItem['discount'];
                $discountInvisible+=0;
                $currentCartItems[$key]['discountInvisible']='';
            }
            $currentCartItems[$key]['subTotalWithoutTax']=$cartItem['service']['total']-$cartItem['discount'];
          
            
            $TotalgovernmentPrice+=$cartItem['service']['government_price'];
            $TotalprintingPrice+=$cartItem['service']['printing_price'];
            $TotalTax+=$cartItem['service']['mainCategory']['tax'];
            $TotalAmount+=$cartItem['service']['total'];

            $totalTaxamount+=  ( (($cartItem['service']['total']-$cartItem['discount']) * $cartItem['service']['mainCategory']['tax'])/100);
            $totalQty+=$cartItem['qty'];
          }
       $subTotalWithoutTax=$TotalAmount-$Totaldiscount;

       $totalTaxAmount=$this->filterPriceData($totalTaxamount);
       $subTotal=$subTotalWithoutTax+ $totalTaxAmount;
       $payWithCompanyAccount='false';

      

       if(@$currentCart->pay_count==1)
       {
        Cart::whereUserId(auth()->user()->id)->where('company_id',$companyId)->update(array('pay_count'=>0));
       }else{
        Cart::whereUserId(auth()->user()->id)->where('company_id',$companyId)->update(array('pay_with_company_account'=>0));
       }
      
      
        $cashAccount= @Company::whereId( $companyId)->first()->cash_account;
        if( $cashAccount>$subTotal)
        {
            $payWithCompanyAccount='true';
        }

         $CartPayWithCompanyAccount=   @Cart::whereUserId(auth()->user()->id)->where('company_id',$companyId)->first()->pay_with_company_account;

        return view('category::companyCategories.currentInvoice',['currentUser'=>$currentUser,'currentCartItems'=>$currentCartItems,'Totaldiscount'=>$Totaldiscount,'TotalAmount'=>$TotalAmount,
        'TotalgovernmentPrice'=>$TotalgovernmentPrice,'TotalprintingPrice'=>$TotalprintingPrice,'TotalTax'=>$TotalTax , 'subTotal'=>$subTotal,'discountInvisible'=>$discountInvisible
         ,'subTotalWithoutTax'=>$subTotalWithoutTax,'totalDiscountInvisible'=>$totalDiscountInvisible,'totalQty'=>$totalQty,'totalTaxAmount'=>$totalTaxAmount,'payWithCompanyAccount'=>$payWithCompanyAccount
         ,'CurrentCompany'=>$CurrentCompany,'CartPayWithCompanyAccount'=>$CartPayWithCompanyAccount
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
    public function delete_cart(Request $request)
    {
        $MainCartId=CartItems::whereId($request->cart_id)->first()->cart_id;

        if(CartItems::whereCartId($MainCartId)->count()==1)
           Cart::where('id',CartItems::whereId($request->cart_id)->first()->cart_id)->delete();
        
          CartItems::whereId($request->cart_id)->delete();

    }
 
    public function saveCompanyInvoice(Request $request)
    {

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
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
          array('user_id'=>$user_id,'main_id'=>$main_id,'order_type'=>2,
          'tax_number'=>$request->tax_number,'user_name'=>$request->user_name,'total_tax'=>$request->total_tax,
          'subtotal'=>$request->subTotal,'total_discount'=>$request->total_discount,'total_discount_invisible'=>$request->total_discount_invisible,
          'total_paid'=>$request->total_paid,'total_remain'=>$totalRemain,'all_paid'=>$request->all_paid,'notes'=>$request->notes,'company_id'=>Session::get('company_id')
      ));

      $currentOrder= Order::orderby('id','desc')->first();


      $companyName = substr(@User::where('id', $main_id)->first()->company_name, 5);
      if(empty($companyName ))
      {
          $companyName ='dalycom';
      }
      $unique_order_id= $companyName.'-'.$currentOrder['id'];


      Order::where('id',$currentOrder['id'])->update(array('unique_order_id'=> $unique_order_id,'order_main'=>$currentOrder['id']));


        foreach($request->service_id as $key=>$value)
        {
        if (empty($request->discountInvisible[$key])) {
            $discountInvisible= 0;
        }
        OrderServices::create(
            array(
                'order_id'=> $currentOrder->id,'service_id'=>$request->service_id[$key],'qty'=>$request->qty[$key] 
                ,'government_price'=>$request->government_price[$key]  ,'printing_price'=>$request->printing_price[$key] 
                ,'discount'=>$request->discount[$key] ,'discount_invisible'=>$discountInvisible
                ,'tax'=>$request->tax[$key] ,'total_without_tax'=>$request->total_without_tax[$key]
            )
        );

        }

        $this->deleteInvoice($request);

        $currentOrderId=$currentOrder['id'];
        return redirect("admin/printCompanyInvoice/$currentOrderId");

    }
    public function trackCompanyInvoice(Request $request)
    {
        Cart::where('user_id',Auth::user()->id)->update(array('track'=>1));
        return redirect()->route('admin.currentCompanyInvoice');
    }
    public function deleteInvoice(Request $request)
    {
        $cart= Cart::where('user_id',Auth::user()->id)->first();
        Cart::where('user_id',Auth::user()->id)->delete();
        CartItems::whereCartId($cart->id)->delete();
        return redirect()->back();
    }

}
