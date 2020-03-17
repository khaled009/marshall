<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use JWTAuth;
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
        $user = JWTAuth::parseToken()->authenticate();
        $id=$user->id;
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes',
            'image'=>'sometimes|image',
            'gender'=>'sometimes',
            'relation_id'=>'sometimes|numeric|exists:relations,id',

        ];
    }
}
