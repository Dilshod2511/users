<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRequest;
use App\Jobs\SendPhoneNomer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\SendSms;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    public function index()
    
    {
        return view('auth.register');
    }

    public function register(RegisterRequest  $request)
    {
        $otp=rand(100000,999999);
        $validate=$request->validated();
        $validate['otp']=$otp;
        $validate['password']=Hash::make($validate['password']);
      $sms=  new SendSms($validate['phone'],$otp)->sendSms;
        User::create($validate);
        return view('auth.verify');
    }

    public function verify(VerifyRequest $request)
    {

        $user=User::where('otp',$request->validated()['otp'])->first();
        $user->otp='true';
        auth()->login($user);
        $user->save();
        return redirect('/');

    }
}
