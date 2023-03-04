<?php

namespace App\Http\Controllers\Auth;

use App\DTO\User\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Jobs\SendOtpSmsToPhoneJob;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request, LoginDTO $DTO): RedirectResponse
    {
        $dto = $DTO::fromArray($request->validated());


        if (!Auth::attempt($dto->jsonSerialize())) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }


        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function send(Request $request)
    {
        $otp = rand(100000, 999999);
        $user = User::query()->where('phone', $request->input('phone'))->first();

        if (!$user) {
            return "bunaqa nomer mavjud emas";
        }

        /**
         * update ni transacsiyani ichida qilin DB::transaction,
         * nmadir bo'p soxranit bo'masa nma qilas
         * sms jo'naturasmi
         */
        DB::transaction(function () use ($user, $otp) {
            $user->update(['otp' => $otp]);
        });

        SendOtpSmsToPhoneJob::dispatch($user->phone, $otp);

        return view('auth.check_verify');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     * Bu keremas nma qilas quru otp ni tekshirib tell nomer siz
     */
    public function check(Request $request): RedirectResponse
    {
        $user = User::query()->where('otp', $request->input('otp'))->first();


        $user->update(
            [
                'otp' => 'true',
                'password' => Hash::make($request->password),
            ]
        );

        return redirect()->route('login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
