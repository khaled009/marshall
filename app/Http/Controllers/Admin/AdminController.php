<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Http\Requests\StoreAdmin;
use Hash;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Admins=Admin::all();
        return view('admin.admins.index',compact('Admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new Admin)->getTable());
        }
        \DB::beginTransaction();
        $newAdmin = Admin::create($requests);
        \DB::commit();
        Flash::success('تم التسجيل بنجاح');

        return redirect()->route('admins.index');
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
        $Admin=Admin::find($id);
        if(is_null($Admin)){
            Flash::error('هذا العضو غير موجود');

            return back();
        }
        return view('admin.admins.edit',compact('Admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdmin $request, $id)
    {
        $Admin=Admin::find($id);
        if(is_null($Admin)){
            Flash::error('هذا العضو غير موجود');

            return back();
        }

        $requests=$request->except('password','image');

        if (!is_null($request->has('password'))) {
            $requests['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new Admin)->getTable());
        }

        $Admin->update($requests);
        Flash::success('تم التعديل بنجاح');

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Admin=Admin::find($id);
        if(is_null($Admin)){
            Flash::error('هذا العضو غير موجود');

            return back();
        }
        $Admin->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
