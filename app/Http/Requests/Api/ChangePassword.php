<?php

namespace App\Http\Requests\api;

use App\Http\Requests\ApiMasterRequest;

class ChangePassword extends ApiMasterRequest
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
            'old_password'=>'required',
            'new_password'=>'required'
        ];
    }
}
