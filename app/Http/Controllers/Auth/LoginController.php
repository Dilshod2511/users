<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Jobs\SendPhoneNomer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

      public function index()
      {
          return view('auth.login');
      }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public  function send(Request $request)
    {
        $ops=rand(100000,999999);
         $user=User::where('phone',$request->phone)->first();
        if($user)
        {
            SendPhoneNomer::dispatch($user->phone,$ops);
            return view('auth.check_verify');
        }else
        {
            return "bunaqa nomer mavjud emas";
        }


    }

    public  function  check(Request $request)
    {
        $user=User::where('otp',$request->validated()['otp'])->first();
        $user->update(
            [
                'otp'=>'true',
                'password'=>Hash::make($request->password),
            ]
        );

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
