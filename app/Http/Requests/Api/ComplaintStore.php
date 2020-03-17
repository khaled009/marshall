<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiMasterRequest;

class ComplaintStore extends ApiMasterRequest
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
            'name'=>'required',
            'mobile'=>'sometimes',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ];
    }
}
