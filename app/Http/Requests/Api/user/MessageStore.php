<?php

namespace App\Http\Requests\Api\user;

use App\Http\Requests\ApiMasterRequest;

class MessageStore extends ApiMasterRequest
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
            'message'=>'required',
            'conversation_id'=>'required|exists:conversations,id'
        ];
    }
}
