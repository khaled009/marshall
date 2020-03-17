<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePlatform;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms=Platform::all();

        return view('admin.platforms.index',compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatform $request)
    {
        $requests = $request->except('_token','image','video');

        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'platform');
        }
        if ($request->hasFile('video')) {

            $requests['video'] = saveImage($request->video, 'platform');
        }
        $coun=Platform::create($requests);
        if (!$coun){
            Flash::error('حدث خطأ أثناء التسجيل');

            return back();
        }
        Flash::success('تم التسجيل بنجاح');

        return redirect(route('platforms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $platform=Platform::find($id);
        if(is_null($platform)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        return view('admin.platforms.show',compact('platform'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $platform=Platform::find($id);
        if(is_null($platform)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        return view('admin.platforms.edit',compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $platform=Platform::find($id);
        if(is_null($platform)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }

        $requests = $request->except('_token','image','video');
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'platform');
        }
        if ($request->hasFile('video')) {

            $requests['video'] = saveImage($request->video, 'platform');
        }
        $platform->update($requests);
        Flash::success('تم التعديل بنجاح');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platform=Platform::find($id);
        if(is_null($platform)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        $platform->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
