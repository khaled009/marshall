<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ApiMasterRequest extends FormRequest
{
    /* Developed By Ahmed Feisal*/

    public function expectsJson()
    {
        return true;
    }

    public function messages()
    {
        return [
            /*'name.required' => 'خانة الاسم مطلوبة',
            'email.required' => 'خانة الايميل مطلوبة',
            'email.unique' => 'هذا الايميل مسجل من قبل',
            'phone.required' => 'خانة رقم الهاتف مطلوبة',
            'country_id.required' => 'خانة الدولة مطلوبة',
            'city_id.required' => 'خانة رقم المدينة مطلوبة',
            'password.required' => 'خانة كلمة السر مطلوبة',
            'password.confirmed' => 'خانة كلمة السر غير متطابقة مع خانة التأكيد',*/
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'data'=>null,
            'status'=>'fails',
            'field' => $validator->errors()->keys()[0],
            'message' => $validator->errors()->first()
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)); // 422
    }
}
