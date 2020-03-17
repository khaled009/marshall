<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Laracasts\Flash\Flash;
use App\Http\Requests\StoreUser;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=User::findByType('patient');
        return view('admin.patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.patients.create');
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

            $requests['image'] = saveImage($request->image, 'patient');
        }
        $requests['type']='patient';
        \DB::beginTransaction();
        $newAdmin = User::create($requests);
        \DB::commit();
        Flash::success('تم التسجيل بنجاح');

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient=User::find($id);
        if(is_null($patient)||$patient->type=='doctor'){
            Flash::error('هذا المريض غير موجود');

            return back();
        }
        return view('admin.patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=User::find($id);
        if(is_null($patient)||$patient->type=='doctor'){
            Flash::error('هذا المريض غير موجود');

            return back();
        }
        return view('admin.patients.edit',compact('patient'));
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
        $patient=User::find($id);
        if(is_null($patient)||$patient->type=='doctor'){
            Flash::error('هذا المريض غير موجود');

            return back();
        }

        $requests=$request->except('password','image');

        if (!is_null($request->has('password'))) {
            $requests['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, 'patient');
        }

        $patient->update($requests);
        Flash::success('تم التعديل بنجاح');

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient=User::find($id);
        if(is_null($patient)||$patient->type=='doctor'){
            Flash::error('هذا المريض غير موجود');

            return back();
        }

        $patient->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
    public function discussion($id){
        $conversations=Conversation::where('patient_id',$id)->get();
        return view('admin.patients.conversations',compact('conversations'));
    }


    public function messages($id){
        $conversation=Conversation::find($id);
        if(is_null($conversation)){
            Flash::error('هذه المحادثة غير موجود');
            return back();
        }
        $messages=$conversation->messages;
        return view('admin.patients.message',compact('messages','conversation'));
    }
}
