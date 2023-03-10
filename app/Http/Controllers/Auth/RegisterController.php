<?php

namespace App\Http\Controllers\Auth;

use App\DTO\User\UserCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRequest;
use App\Models\User;
use Exception;
use App\Http\Services\SendSms;
use app\Traits\CreateUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{

    use CreateUser;

    public function index()
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return Application|Factory|View
     */
    public function register(RegisterRequest $request)
    {

        $new=$this->createUserRegister($request);

        return view('auth.verify');
    }

    /**
     * @throws Exception
     */
    public function verify(VerifyRequest $request)
    {

        $data = $request->session()->get('user.phone');


//        $phone = array_shift($data);

       $user = User::query()->where('phone', $data)->first();

        if ($user == null) {
            throw new Exception('Phone is not have, pleece register in the first');
        }

        if ($user->otp != $request->input('otp')) {
            throw new Exception('Otp is wrong');
        }

        $user->is_verified = true;

        DB::transaction(function () use ($user) {
            $user->save();
        });

        auth()->login($user);
        return redirect('/');

    }
}
