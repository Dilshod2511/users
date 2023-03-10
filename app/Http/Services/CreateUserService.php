<?php

namespace App\Http\Services;

use App\DTO\User\UserCreateDTO;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use app\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserService
{
    use UploadFile;

    // public function createUserRegister(RegisterRequest $request)
    // {
    //     $otp = $this->getOtp();
    //     $validate = $request->validated();
    //     $DTO = new UserCreateDTO(
    //         Hash::make($validate['password']),
    //         $otp,
    //         $validate['phone'],
    //         $validate['email'],
    //         $validate['full_name']
    //     );

    //     DB::transaction(function () use ($DTO) {
    //         User::query()->create($DTO->jsonSerialize());
    //     });
    // }

}











?>