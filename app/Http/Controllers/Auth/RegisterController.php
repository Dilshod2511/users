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
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    use CreateUser;

    public function index(): Factory|View|Application
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return Application|Factory|View
     */
    public function register(RegisterRequest $request): View|Factory|Application
    {

        $this->createUserRegister($request);

        return view('auth.verify');
    }

    /**
     * @throws Exception
     */
    public function verify(VerifyRequest $request): Redirector|Application|RedirectResponse
    {

        $data = $request->session()->get('user.phone');



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
