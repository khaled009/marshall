@extends('admin.layouts.app')
@section('title')  {{$Setting->slug}} @endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption ">
                        <i class="fa fa-globe"></i> {{$Setting->slug}}
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover">
                        <tbody>
                        <!-- User Id Field -->
                        @if(in_array($Setting->type,[0,3]))

                                <tr>
                                    <td> {{$Setting->slug}} بالعربية </td>
                                    <td class="text-center"> {!!   $Setting->ar_value !!} </td>
                                </tr>
                                <tr>
                                    <td> {{$Setting->slug}} بالانجليزية </td>
                                    <td class="text-center"> {!!   $Setting->en_value !!} </td>
                                </tr>

                        @elseif($Setting->type==1)
                            <tr>
                                <td class="text-center"> {{ $Setting->ar_value}} </td>
                            </tr>
                        @elseif($Setting->type==2)
                            <tr>
                                <td><img src="{!! asset($Setting->ar_value) !!}" width="300px"></td>
                            </tr>

                        @endif

                        <!-- Amount Field -->

                        </tbody>
                    </table>
                    <button onclick="goBack()" class="btn btn-info btn_1"> للعودة <i class="fa fa-arrow-left" aria-hidden="true"></i>  </button>

                </div>

                {{--
                @include('admin.Category._table')
                --}}
                {{--</div>--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>

@endsection
@section('footer')@endsection


