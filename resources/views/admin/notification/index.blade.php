@extends('admin.layouts.app')
@section('title')ارسال اشعار جديد@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-pin font-green"></i>
                        <span class="caption-subject bold uppercase"> ارسال اشعار جديد</span>
                    </div>

                </div>
                <div class="portlet-body form">

                    <form role="form" action="{{ route('notification.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-body">
                            <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('title') ? ' has-error' : 'has-success' }} ">
                                {!!Form::text('title',null,['class'=>'form-control','required'=>'required'])!!}
                                <label for="form_control_1">عنوان الاشعار</label>
                            </div>


                            <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('body') ? ' has-error' : 'has-success' }}">

                                {!!Form::text('body',null,['class'=>'form-control','required'=>'required'])!!}
                                <label for="form_control_1">محتوي الاشعار</label>
                            </div>



                        </div>

                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue btn_1">حفظ</button>
                            <button type="reset" class="btn default btn_2">الغاء</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection

