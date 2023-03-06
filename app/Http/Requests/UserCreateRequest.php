<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'workplace' => 'required',
            'area_code' =>'required',
            'date_of_membership' => 'required',
            'photo' => 'required',
            'distance' =>'required',
            'work_seniority' => 'required',
            'awards' => 'required',
            'driver_category' => 'required',
            'truck_number' =>'required',
            'truck_brand' => 'required',
            'year' =>'required',
            'condition' => 'required',
            'fuel' => 'required',
            'number' => 'required',
            'capacity' => 'required',
            "passport" => 'required',
            "certificate" => 'required',
            "employment_book" => 'required',
            "tex_passport" => 'required',
        ];
    }
}
