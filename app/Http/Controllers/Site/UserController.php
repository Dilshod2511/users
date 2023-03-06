<?php

namespace App\Http\Controllers\Site;

use App\DTO\User\DrivingCreateDTO;
use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserCreateFormDTO;
use App\DTO\User\VehicleCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\DriverInformation;
use App\Models\User;
use App\Models\WihecleInformation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UserCreateRequest $request): Response
    {

        $validate = $request->validated();

        $DTO = new UserCreateFormDTO(
            $validate['workplace'],
            $validate['area_code'],
            $validate['date_of_membership'],
            $validate['photo'],
            $validate['distance'],
            $validate['work_seniority'],
            $validate['awards'],
            $validate['driver_category']);

        DB::transaction(function () use ($DTO) {
          $user=  User::query()->find(auth()->user()->id)->update($DTO->jsonSerialize());
        });

        $DTO = new VehicleCreateDTO(

            $validate['truck_number'],
            $validate['truck_brand'],
            $validate['user_id']=auth()->user()->id,
            $validate['year'],
            $validate['condition'],
            $validate['fuel'],
            $validate['number'],
        $validate['capacity'],);

        DB::transaction(function () use ($DTO) {
            WihecleInformation::query()->create($DTO->jsonSerialize());
        });
        $DTO = new DrivingCreateDTO(

            $validate['user_id']=auth()->user()->id,
            $validate['passport'],
            $validate['certificate'],
            $validate['employment_book'],
            $validate['tex_passport'],);

        DB::transaction(function () use ($DTO) {
            DriverInformation::query()->create($DTO->jsonSerialize());
        });

        return redirect('/');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        //
    }
}
