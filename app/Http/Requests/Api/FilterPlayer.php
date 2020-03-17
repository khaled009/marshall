<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class FilterPlayer extends ApiMasterRequest
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
            'filter'=>'required|in:THIS_YEAR,THIS_MONTH,THIS_WEEK,TODAY'
        ];
    }
}
