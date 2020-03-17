<?php

namespace App\Http\Requests\Api\user;

use App\Http\Requests\ApiMasterRequest;

class ReuploadVideo extends ApiMasterRequest
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
            'video_id'=>'required|exists:videos,id',
            'video'=>'required|mimetypes:video/mp4,video/x-msvideo,video/quicktime,video/x-ms-wmv'
        ];
    }
}
