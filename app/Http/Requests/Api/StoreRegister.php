<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\ApiMasterRequest;

class StoreRegister extends ApiMasterRequest
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
     * exists:cities,id
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'mobile' => 'required|string|max:255|unique:users,mobile',
            'password' => 'required|min:6',
            'age'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'position'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'foot'=>'required|in:right,left,both',
            'device_token'=>'required',
            'device_type'=>'required',

        ];
    }
}
