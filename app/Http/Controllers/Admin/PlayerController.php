<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUser;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players=User::findByType('user');
        return view('admin.players.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.players.create');
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
        $requests['type']='user';
        \DB::beginTransaction();
        $newAdmin = User::create($requests);
        \DB::commit();
        Flash::success('تم التسجيل بنجاح');

        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player=User::find($id);
        if(is_null($player)||$player->type!='user'){
            Flash::error('هذا اللاعب غير موجود');

            return back();
        }
        return view('admin.players.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player=User::find($id);
        if(is_null($player)||$player->type!='user'){
            Flash::error('هذا اللاعب غير موجود');

            return back();
        }
        return view('admin.players.edit',compact('player'));
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
        if(is_null($parent)||$parent->type!='user'){
            Flash::error('هذا الوالد غير موجود');

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

        return redirect()->route('players.index');
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
        if(is_null($parent)||$parent->type!='user'){
            Flash::error('هذا الاعب غير موجود');

            return back();
        }

        $parent->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }

}
