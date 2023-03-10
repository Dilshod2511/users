<?php

namespace app\Traits;

use App\DTO\User\DrivingCreateDTO;
use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserCreateFormDTO;
use App\DTO\User\VehicleCreateDTO;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserCreateRequest;
use App\Jobs\SendOtpSmsToPhoneJob;
use App\Models\DriverInformation;
use App\Models\User;
use App\Models\WihecleInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait CreateUser
{
    use UploadFile;
    public function getOtp()
    {
       return rand(1000, 9999);
    }

    public function createUserRegister(RegisterRequest $request)
    {
        $validate = $request->validated();
        $DTO = new UserCreateDTO(
            Hash::make($validate['password']),
            $this->getOtp(),
            $validate['phone'],
            $validate['email'],
            $validate['full_name']
        );
        if(auth()->user()->role!=1)
        {
             SendOtpSmsToPhoneJob::dispatch($request->input('phone'),  $this->getOtp());
        }
       
           $user= User::query()->create($DTO->jsonSerialize());

        $request->session()->put(['user.phone'=>$DTO->getPhone(),'user_id'=>$user->id]);

        

    }

    public function CreateUserForm(UserCreateRequest $request)
    {
        $validate = $request->validated();

        $DTO = new UserCreateFormDTO(
            $validate['workplace'],
            $validate['area_code'],
            $validate['date_of_membership'],
            $validate['photo']=$this->uploadImage($request),
            $validate['distance'],
            $validate['work_seniority'],
            $validate['awards'],
            $validate['driver_category']);

        DB::transaction(function () use ($DTO) {
           User::query()->find(session()->get('user_id'),)->update($DTO->jsonSerialize());
        });
        $this->VehicleCreate($request);
        $this->DrivingCreate($request);
    }

    public function VehicleCreate(UserCreateRequest $request)
    {
        $validate = $request->validated();
        $DTO = new VehicleCreateDTO(

            $validate['truck_number'],
            $validate['truck_brand'],
            $validate['user_id']=$request->session()->get('user_id'),
            $validate['year'],
            $validate['condition'],
            $validate['fuel'],
            $validate['number'],
        $validate['capacity'],);

        DB::transaction(function () use ($DTO) {
            WihecleInformation::query()->create($DTO->jsonSerialize());
        });
    }
    public function DrivingCreate(UserCreateRequest $request)
    {
        $validate = $request->validated();
        $DTO = new DrivingCreateDTO(

            $validate['user_id']=$request->session()->get('user_id'),
            $validate['passport']=$this->uploadPdf($request->file('passport')),
            $validate['certificate']=$this->uploadPdf($request->file('certificate')),
            $validate['employment_book']=$this->uploadPdf($request->file('employment_book')),
            $validate['tex_passport']=$this->uploadPdf($request->file('tex_passport')),);

        DB::transaction(function () use ($DTO) {
            DriverInformation::query()->create($DTO->jsonSerialize());
        });
      
    }



}
