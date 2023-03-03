<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRequest;
use App\Jobs\SendPhoneNomer;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest  $request)
    {
        $ops=rand(100000,999999);
        $validate=$request->validated();
        $validate['ops']=$ops;
        SendPhoneNomer::dispatch($validate['phone'],$ops);
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
