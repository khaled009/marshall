<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips=Tip::all();

        return view('admin.tips.index',compact('tips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = $request->except('_token');
        $coun=Tip::create($requests);
        if (!$coun){
            Flash::error('حدث خطأ أثناء التسجيل');

            return back();
        }
        Flash::success('تم التسجيل بنجاح');

        return redirect(route('tips.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip=Tip::find($id);
        if(is_null($tip)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        return view('admin.tips.edit',compact('tip'));
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
        $default=Tip::find($id);
        if(is_null($default)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }

        $requests = $request->except('_token');

        $default->update($requests);
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
        $default=Tip::find($id);
        if(is_null($default)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        $default->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
