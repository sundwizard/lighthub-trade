<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ResetPasswordMail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthenticatedUserController extends Controller
{

    public function AuthenticatedUserController(){
        $role = Auth::user()->user_type;

        switch ($role) {
          case 'Super Admin':
             return redirect()->route('super-admin.dashboard');
             break;

          case 'Staff':
            return redirect()->route('staff.dashboard');
             break;
        }
    }

    public function logOutUser(){
        if(Auth::user()!=null){
            Session::flush();

            //checked the type of user login out and redirect
            return redirect()->route('welcome');
        }else{
            return redirect()->route('welcome');
        }

    }

    public function forgetpassword(Request $request){
        $data = $request->validate([
            'email' => ['email','required']
        ]);

        $checkMail =  User::where(['email'=>$data['email'],'status'=>'Active'])->first();

        if($checkMail!=null){
            $otp_code = ResetPasswordMail::create([
                'email' => $checkMail->email,
                'token' => $token = Str::random(60),
                'otp' => $otp = mt_rand(2,1000000),
            ]);

            $url = url('set-password/'.$checkMail->email.'/'.$token);
            Mail::to($checkMail)->queue(new ResetPassword($checkMail,$url));
            return back()->with('success-feedback','Password successfully resset, a reset link has been sent to your register mail');
        }else{
            return back()->with('error-feedback','Sorry this email is either incorrect or your accountis disabled, kindly contact your branch manager for assistance');
        }
    }
}
