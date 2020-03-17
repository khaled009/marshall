<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Laracasts\Flash\Flash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Setting::all();


        return View('admin.settings.index', compact('settings'));
    }

    public function show($id)
    {
        $Setting = Setting::find($id);
        return view('admin.settings.show', compact('Setting'));
    }

    public function edit($id)
    {

        $setting = Setting::find($id);
        if (is_Null($setting)) {
            Flash::error('هذا الاعداد غير موجود');
            return back();
        }

        return View('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        $rules = [
            'ar_value' => 'required|string',
            'en_value' => 'required|string',
        ];
        if ($setting->type == 1) {
            $rules = [
                'ar_value' => 'required|numeric',
                'en_value' => 'required|numeric',
            ];
        } elseif ($setting->type == 2) {
            $rules = [
                'ar_value' => 'required|image',
            ];
        }elseif($setting->type==4){
            $rules = [
                'ar_value' => 'required|string',
            ];
        }
        $requests = $request->validate($rules);


        if($setting->type == 2){

            $requests['ar_value']= saveImage($request->ar_value,'settings');

        }
                $setting->update($requests);
        Flash::success(' تم التعديل بنجاح');

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
}
