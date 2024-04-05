<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;
use Modules\User\Service\ClientService;
use  Modules\User\App\Http\Requests\AuthRequest;
use  Modules\User\App\Http\Requests\ResetPassword;
use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $ClientService;
    public function __construct(ClientService $ClientService)
    {
        $this->ClientService = $ClientService;
    }

    public function showLoginForm()
    {
        return view('user::auth.login');
    }

    public function Login(AuthRequest $request){

        if(!empty(@$_COOKIE['USER_Password']) && $request->password=='******' && $request->remember_me==1)
        $request['password']=  @$_COOKIE['USER_Password'];
       
            
        if (Auth::attempt(['email' => $request['email'],'password' => $request['password']]) )
        {
           
            if($request->remember_me==1)
            {
                setcookie('USER_EMAIL', $request->email , time() + 86400 * 30);
                setcookie('USER_Password', $request->password , time() + 86400 * 30);
            }
            else{
                unset($_COOKIE['USER_EMAIL']);
                unset($_COOKIE['USER_Password']);
                setcookie('USER_EMAIL','',time()-86400*30);
                setcookie('USER_Password','',time()-86400*30);
            }

          $user = User::where('email', $request['email'])->first();

          if( $user->role =='isSuperAdmin')
          {
            return redirect()->to('admin/admins');
          }else{
            return redirect()->to('admin/dashboard');
          }
           
        }
               
        
        return redirect()->back()->withErrors(['error' => 'invalid data']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function showForgetPassword( )
    {
        return view('user::auth.forget_password');
    }
    public function forget_password(Request $request)
    {
        $userExist = User::where('email', $request->email)->first();
        if (!$userExist) 
            return back()->with('alert_msg', "البريد الالكترونى غير موجود" );
       
        $token = sha1(time());
        User::where('email',  $request->email)->update(['remember_token'=>$token ]);
        Mail::to($request->email)->send(new ForgetPassword($token, $request->email));
        return back()->with('success_msg', "تم ارسال البريد الالكترونى" );
    }
    public function  showResetPassword ($token)
    {
        $email=User::where('remember_token',$token)->first()->email;
        return view('user::auth.reset_password',compact('email','token'));
    }

    public function resetPassword( ResetPassword $request)
    {
        $userExist = User::where(array('email'=>$request->email,'remember_token'=>$request->token))->first();
        if (!$userExist) 
          return back()->with('alert_msg', " حدث خطا اعد المحاولة لاحقا " );
         
        User::where(array('email'=>$request->email,'remember_token'=>$request->token))->update(['password' =>  Hash::make($request->password),'remember_token'=>'']);
       return redirect()->to('login');
    }
    

}
