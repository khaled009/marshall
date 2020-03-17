<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiMasterRequest;

class TypeRegisterRequest extends ApiMasterRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'mobile' => 'required|string|max:255|unique:users,mobile',
            'password' => 'required|min:6',
            'latitude'=>'required',
            'longitude'=>'required',
            'identify_image'=>'required|image',
            'club_image'=>'required|image',
            'trainee_image'=>'required|image',
            'device_token'=>'required',
            'device_type'=>'required',
        ];
    }
}
