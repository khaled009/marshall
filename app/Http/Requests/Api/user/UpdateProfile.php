<?php

namespace App\Http\Requests\Api\user;

use App\Http\Requests\ApiMasterRequest;

class UpdateProfile extends ApiMasterRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.request()->user()->id,
            'mobile' => 'sometimes|string|max:255|unique:users,mobile,'.request()->user()->id,
            'age'=>'sometimes',
            'height'=>'sometimes',
            'weight'=>'sometimes',
            'position'=>'sometimes',
            'latitude'=>'sometimes',
            'longitude'=>'sometimes',
            'foot'=>'sometimes|in:right,left,both',
        ];
    }
}
