<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatform extends FormRequest
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
            'title'=>'sometimes',
            'description'=>'sometimes',
            'attempts'=>'sometimes|min:1',
            'image'=>'sometimes|image',
            'video'=>'sometimes|mimes:mp4',
        ];
    }
}
