<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreChild;
use App\Http\Requests\UpdateChild;
use App\Models\UserBehavior;
use App\Models\UserReward;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class ChildConrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children=User::findByType('child');
        return view('admin.children.index',compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.children.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChild $request)
    {
        $requests = $request->all();
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'users');
        }
        $requests['type']='child';
        \DB::beginTransaction();
        $newAdmin = User::create($requests);
        \DB::commit();
        Flash::success('تم التسجيل بنجاح');

        return redirect()->route('children.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $child=User::find($id);
        if(is_null($child)||$child->type=='parent'){
            Flash::error('هذا الطفل غير موجود');

            return back();
        }
        return view('admin.children.show',compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child=User::find($id);
        if(is_null($child)||$child->type=='parent'){
            Flash::error('هذا الطفل غير موجود');

            return back();
        }
        return view('admin.children.edit',compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChild $request, $id)
    {
        $child=User::find($id);
        if(is_null($child)||$child->type=='parent'){
            Flash::error('هذا الطفل غير موجود');

            return back();
        }

        $requests=$request->except('image');


        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'users');
        }

        $child->update($requests);
        Flash::success('تم التعديل بنجاح');

        return redirect()->route('children.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child=User::find($id);
        if(is_null($child)||$child->type=='parent'){
            Flash::error('هذا الطفل غير موجود');

            return back();
        }

        $child->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
    public function behavior_destroy($id)
    {
        $child=UserBehavior::find($id);
        if(is_null($child)){
            Flash::error('هذا السلوك غير موجود');

            return back();
        }

        $child->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
    public function reward_destroy($id)
    {
        $child=UserReward::find($id);
        if(is_null($child)){
            Flash::error('هذه المكأفة غير موجودة');

            return back();
        }

        $child->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
    public function set_password($id)
    {
        $child=User::find($id);
        if(is_null($child)){
            Flash::error('هذا الطفل غير موجود');

            return back();
        }

        $password=mt_rand(1000, 9999);
        $child->child_password=$password;
        $child->identify_number=mt_rand(10000000, 99999999);
        $child->password = Hash::make($password);
        $child->update();
        Flash::success('تم انشاء كلمة المرور بنجاح');

        return back();
    }


}
