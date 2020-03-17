@extends('admin.layouts.app')
@section('title')تعديل بيانات مدير {{$Admin->name}}@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-pin font-green"></i>
                        <span class="caption-subject bold uppercase"> تعديل بيانات مدير {{$Admin->name}}</span>
                    </div>

                </div>
                <div class="portlet-body form">

                    {!!Form::model($Admin,['route'=>['admins.update',$Admin->id],'method'=>'put', 'novalidate','files'=>'true'])!!}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @include('admin.admins._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection
@section('footer')


@endsection




