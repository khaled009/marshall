<?php

namespace App\Http\Controllers\Admin;

use App\Models\Relation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relations=Relation::all();

        return view('admin.relations.index',compact('relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.relations.create');
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
        $coun=Relation::create($requests);
        if (!$coun){
            Flash::error('حدث خطأ أثناء التسجيل');

            return back();
        }
        Flash::success('تم التسجيل بنجاح');

        return redirect(route('relations.index'));
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
        $relation=Relation::find($id);
        if(is_null($relation)){
            Flash::error('هذه الصلة غير موجودة');
            return back();
        }
        return view('admin.relations.edit',compact('relation'));
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
        $relation=Relation::find($id);
        if(is_null($relation)){
            Flash::error('هذه الصلة غير موجودة');
            return back();
        }

        $requests = $request->except('_token');

        $relation->update($requests);
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
        $relation=Relation::find($id);
        if(is_null($relation)){
            Flash::error('هذه الصلة غير موجودة');
            return back();
        }
        $relation->delete();
        Flash::success('تم الحذف بنجاح');

        return back();
    }
}
