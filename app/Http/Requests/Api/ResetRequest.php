<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiMasterRequest;

class ResetRequest extends ApiMasterRequest
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
            'code'=>'required|exists:users,reset_code',
            'password'=>'required|min:6'
        ];
    }
}
