<?php

namespace App\Http\Controllers\Auth;

use App\DTO\User\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Jobs\SendOtpSmsToPhoneJob;
use App\Models\User;
use app\Traits\CreateUser;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use CreateUser;

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): string|RedirectResponse
    {
        $DTO = new LoginDTO($request->input('password'), $request->input('email'));

        if (!Auth::attempt($DTO->jsonSerialize())) {

            return 'The provided credentials do not match our records.';

        }


        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function send(Request $request): View|Factory|string|Application
    {
        $phone = $request->input('phone');
        $otp = $this->getOtp();
        $user = User::query()->where('phone', $phone)->first();

        if ($user == null) {
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

        $request->session()->push('user.phone', $phone);

        return view('auth.check_verify');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     * Bu keremas nma qilas quru otp ni tekshirib tell nomer siz
     * @throws Exception
     */
    public function check(Request $request): RedirectResponse
    {
        $data = $request->session()->get('user.phone');

        $user = User::query()
            ->where('phone', $data)
            ->where('otp', $request->input('otp'))
            ->first();

        if ($user == null) {
            throw new Exception('Wrong data');
        }


        $user->update(
            [
                'is_verified' => true,
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
