<?php

namespace App\Http\Controllers\Auth;

use App\DTO\User\UserCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRequest;
use App\Models\User;
use Exception;
use App\Http\Services\SendSms;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()

    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @param UserCreateDTO $DTO
     * @return Application|Factory|View
     */
    public function register(RegisterRequest $request)
    {
        $validate=$request->validated();
        $otp = rand(100000, 999999);
        $DTO=(new UserCreateDTO($validate['password'],$validate['email'],$otp,$validate['phone'],$validate['full_name']));


        $userData = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'otp' => $otp
        ];

        //Bu klass hich nima qimiyapti oddiy Jobi dispatch qisezam bo'ladi
        (new SendSms($request->input('phone'), $otp))->sendSmsPhone();

        $dto = $DTO::fromArray($userData);

        DB::transaction(function () use ($dto) {
            User::query()->create($dto->jsonSerialize());
        });

        return view('auth.verify');
    }

    /**
     * @throws Exception
     */
    public function verify(VerifyRequest $request)
    {
        $user = User::query()->where('phone', $request->input('phone'))->first();

        if ($user == null) {
            throw new Exception('Phone is not have, pleece register in the first');
        }

        if ($user->otp != $request->input('otp')) {
            throw new Exception('Otp is wrong');
        }

        $user->otp = 'true';
        $user->save();
        auth()->login($user);
        return redirect('/');

    }
}
