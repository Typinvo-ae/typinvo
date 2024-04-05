<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use  Modules\Common\Http\Requests\UpdateProfileRequest;
use  Modules\Common\Http\Requests\updatManageInvoiceRequest;
use  Modules\Common\Http\Requests\updatGeneralSettingRequest;
use App\Models\ManageInvoice;
use Modules\Common\Helper\UploaderHelper;
class CommonController extends Controller
{
    use UploaderHelper;
    public function profile()
    {
         $userDetails = User::whereId(auth()->user()->id )->first();
        return view('common::profile.index', ['user' => $userDetails]);
    }
    public function updateProfile(UpdateProfileRequest $request)
    {
         $data = $request->all();
        if (request()->hasFile('image')) {
            File::delete(public_path('uploads/Client/' . $this->getImageName('Client',  $data['image'] )));
            $image = request()->file('image');
            $imageName =uploadImage( request()->file('image'),'user');
            $data['image'] = $imageName;
        }
        if ($data['password'] == null) unset($data['password']);
        User::findorfail($request->id)->update($data);
        return redirect('admin/profile')->with('updated','updated');
    }
  

    public function generalSetting()
    {
        
         $userDetails = User::whereId(auth()->user()->id )->first();
        return view('common::generalSetting.index', ['user' => $userDetails]);
    }
    public function updatGeneralSetting(updatGeneralSettingRequest $request)
    {
     
         $data = $request->all();
        if (request()->hasFile('company_image')) {
            File::delete(public_path('uploads/Client/' . $this->getImageName('Client',  $data['company_image'] )));
            $image = request()->file('company_image');
            $imageName =uploadImage( request()->file('company_image'),'user');
            $data['company_image'] = $imageName;
        }
        User::findorfail($request->id)->update($data);
        return redirect('admin/generalSetting')->with('updated','updated');
    }

    public function manageInvoice()
    {
         $InvoiceDetails = ManageInvoice::whereUserId(auth()->user()->id )->first();
        return view('common::manageInvoice.index', ['InvoiceDetails' => $InvoiceDetails,'userId'=>auth()->user()->id ]);
    }

   
    
    public function updatManageInvoice(Request $request)
    {
        $InvoiceDetails = ManageInvoice::whereUserId($request->user_id )->first();
        if($InvoiceDetails)
        {
            ManageInvoice::where('user_id',$request->user_id)->update($request->except(['_token','user_id']));
        }else{
            ManageInvoice::create($request->except('_token'));
        }
        return redirect()->back();
    }


    public function change_color($color)
    {
        User::where('id',auth()->user()->id)->update(array('color'=>$color));
        return redirect()->back();
    }



}
