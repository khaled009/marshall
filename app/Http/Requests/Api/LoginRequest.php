<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiMasterRequest;


class LoginRequest extends ApiMasterRequest
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
            'mobile'=>'required|exists:users,mobile',
            'password'=>'required',
            'device_token'=>'required',
            'device_type'=>'required',
        ];
    }
}
