<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaults=Reward::all();

        return view('admin.rewards.index',compact('defaults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rewards.create');
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
        $coun=Reward::create($requests);
        if (!$coun){
            Flash::error('حدث خطأ أثناء التسجيل');

            return back();
        }
        Flash::success('تم التسجيل بنجاح');

        return redirect(route('rewards.index'));
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
        $behavior=Reward::find($id);
        if(is_null($behavior)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        return view('admin.rewards.edit',compact('behavior'));
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
        $default=Reward::find($id);
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
        $default=Reward::find($id);
        if(is_null($default)){
            Flash::error('هذا المحتوي غير موجود');
            return back();
        }
        $default->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
