<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiMasterRequest;

class ActiveRequest extends ApiMasterRequest
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
            'code'=>'required|exists:users,code'
        ];
    }
}
