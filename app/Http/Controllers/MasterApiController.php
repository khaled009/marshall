<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use JWTAuth;

class MasterApiController extends Controller
{
    public $lang;
    public $user;

    function __construct(Request $request)
    {
        $this->Set_Request_Language($request);
        if ($request->header('Authorization') && JWTAuth::parseToken()) {
            try {
                // JWTAuth::parseToken()->authenticate()
                $this->user = JWTAuth::parseToken()->toUser();
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    function Set_Request_Language($request)
    {
        if ($request->header('Accept-Language')) {
            if ($request->header('Accept-Language') == "ar") {
                $this->lang = "ar";
            } else {
                $this->lang = "en";
            }
        } else {
            $this->lang = "ar";
        }
        \App::setLocale($this->lang);
        Carbon::setLocale($this->lang);
    }
}
