<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUser;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=User::findByType('agent');
        return view('admin.agents.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }
        $requests['type']='agent';
        \DB::beginTransaction();
        $newAdmin = User::create($requests);
        \DB::commit();
        Flash::success('تم التسجيل بنجاح');

        return redirect()->route('agents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coach=User::find($id);
        if(is_null($coach)||$coach->type!='agent'){
            Flash::error('هذا الوكيل غير موجود');

            return back();
        }
        return view('admin.agents.show',compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coach=User::find($id);
        if(is_null($coach)||$coach->type!='agent'){
            Flash::error('هذا الوكيل غير موجود');

            return back();
        }
        return view('admin.agents.edit',compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    {
        $parent=User::find($id);
        if(is_null($parent)||$parent->type!='agent'){
            Flash::error('هذا الوكيل غير موجود');

            return back();
        }

        $requests=$request->except('password','image');

        if (!is_null($request->has('password'))) {
            $requests['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'users');
        }

        $parent->update($requests);
        Flash::success('تم التعديل بنجاح');

        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent=User::find($id);
        if(is_null($parent)||$parent->type!='agent'){
            Flash::error('هذا الوكيل غير موجود');

            return back();
        }

        $parent->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
