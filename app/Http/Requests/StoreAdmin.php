<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin;

class StoreAdmin extends FormRequest
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
        $id=$this->route('id');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,id'.$id,
            'password' => ' required_without_all:_method|confirmed',
            'image'=>'sometimes|required|image'
        ];
    }
}
