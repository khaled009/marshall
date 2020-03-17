<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$this->route('player'),
            'mobile' => 'sometimes|string|max:255|unique:users,mobile,'.$this->route('player'),
            'password' => 'sometimes|min:6',
            'age'=>'sometimes',
            'height'=>'sometimes',
            'weight'=>'sometimes',
            'position'=>'sometimes',
            'foot'=>'sometimes|in:right,left,both',
        ];
    }
}
