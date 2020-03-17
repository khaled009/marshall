@extends('admin.layouts.app')
@section('title')اضافه منصة جديدة@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-pin font-green"></i>
                        <span class="caption-subject bold uppercase"> اضافه منصة جديدة</span>
                    </div>

                </div>
                <div class="portlet-body form">

                    <form role="form" action="{{ route('platforms.store') }}"  method="POST" enctype="multipart/form-data">
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
                        @include('admin.platforms._form')
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection

