@extends('admin.layouts.app')
@section('title')
    الرد ع رساله
@endsection

@section('header')

@endsection

@section('content')
    <!-- Vertical form options -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">الرد ع رساله</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">

                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('universities.store') }}"  method="POST" enctype="multipart/form-data">
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




                    <div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('title') ? ' has-error' : 'has-success' }}">
                        <label for="form_control_1">عنوان الاشعار</label>
                        {!!Form::textarea('title',old('title'),['class'=>'form-control','required'])!!}

                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('message') ? ' has-error' : 'has-success' }} ">
                        <label for="form_control_1">نص الاشعار</label>
                        {!!Form::textarea('message',old('message'),['class'=>'form-control ','required'=>'required'])!!}

                    </div>

                    <div class="form-actions noborder">
                        <button type="submit" class="btn btn-info btn_1">ارسال</button>
                    </div>
                    </div>
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
