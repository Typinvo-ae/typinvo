<?php

use Intervention\Image\Facades\Image;
use Modules\Settings\Entities\MainCategory;
use Modules\Category\Entities\Category;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Company;
use App\Models\CompanyTransactions;

 function uploadImage($imageFromRequest, $imageFolder, $resize = false)
{

    $fileName = time() . $imageFromRequest->getClientOriginalName();
    $location = public_path('uploads/' . $imageFolder . '/' . $fileName);
    $image = Image::make($imageFromRequest);
    $image->resize(500,500);
    $image->save($location, 50);

 
    return $fileName;
}

 function getImageName($folderName,$imagePath)
{
    $needle = $folderName.'/';
    return substr($imagePath, strpos($imagePath, $needle) + strlen($needle));
}

function LastMainCategory()
{
    $MainCategory= MainCategory::OrderBy('id','desc')->first();
    if( $MainCategory)
    {
        $MainCategory= $MainCategory->order+1;
    }else{
        $MainCategory=1;
    }
  return $MainCategory;
}

function checkUserCart()
{
    $currentCart=Cart::whereUserId(@Auth::user()->id)->first();
    $cartCheck="noCart"; 
    if($currentCart && @$currentCart->track==0)
    {
        $cartCheck="cartTrack"; 
    }
    return $cartCheck;
}
function CartPadge()
{
    $currentCart=Cart::whereUserId(Auth::user()->id)->first();
    return CartItems::where('cart_id',  @$currentCart->id)->count();

}

function CompanyPadge()
{
    $userCompanies=   Company::where('user_id',Auth::user()->id)->where('visible',1)->pluck('id');
    return  CompanyTransactions::wherein('id',$userCompanies)->where('status',1)->count();
}
function checkUserCartType()
{
    $currentCart=Cart::whereUserId(@Auth::user()->id)->first();
    $cartType="noCart"; 
    if($currentCart)
    {
        if($currentCart->company_id != 0)
        {
            $cartType="company"; 
        }else{
            $cartType="normal"; 
        }
    }
    return $cartType;
}
function LastCategory()
{
   
    $Category= Category::OrderBy('id','desc')->first();
    if( $Category)
    {
        $Category= $Category->order+1;
    }else{
        $Category=1;
    }
    return  $Category;
}

