@extends('admin.layouts.app')
@section('title')
    الاعدادت
     @endsection
 @section('content')
                    <div class="row">
                    <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>الاعدادات</div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
@include('admin.settings._table')
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>

                    </div>

@endsection
 @section('footer')@endsection


