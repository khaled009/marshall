@extends('admin.layouts.app')

@section('title')
    الرئيسية
    @stop
@section('content')

            <div class="page-head">
                <div class="page-title">
                    <h1 class="text-center">لوحــة التحــكم أكاديمية مارشال<hr></h1>
                </div>
            </div>

            <!-- Start Code Cart Student-->
            <section class="allSection">


                <div class="row">
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card">
                            <i class="fas fa-users"></i>
                            <span class="Number_Student"> {{count(App\User::findByType('user'))}}</span>
                            <p> عدد اللاعبين</p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card Card_two">
                            <i class="fas fa-child" aria-hidden="true"></i>
                            <span class="Number_Student"> {{count(App\User::findByType('coach'))}} </span>
                            <p> عدد المدربين </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card Card_three">
                            <i class="fas fa-archive" aria-hidden="true"></i>
                            <i class="fas fa-diamond"></i>
                            <span class="Number_Student"> {{count(App\User::findByType('agent'))}} </span>
                            <p>  عدد الوكلاء </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card Card_fOUR" style="background: #aa7491;  ">
                            <i class="fas fa-address-book" aria-hidden="true"></i>
                            <span class="Number_Student"> {{count(App\Models\Platform::all())}} </span>
                            <p> عدد المنصات </p>
                        </div>

                    </div>

          {{--          <div class="col-xs-12 col-sm-4">

                        <div class="Card " style="background: #f4d03f;  ">
                            <i class="fas fa-award" aria-hidden="true"></i>
                            <span class="Number_Student"> {{count(App\Models\Reward::all())}} </span>
                            <p> المكأفات </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card  Card_two" style="background: #85aaa6;  ">
                            <i class="fas fa-walking" aria-hidden="true"></i>
                            <span class="Number_Student"> {{count(App\Models\Behavior::all())}} </span>
                            <p> جميع السلوكيات </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="Card  Card_two" style="background: #aaa8a3;  ">
                            <i class="fas fa-sticky-note" aria-hidden="true"></i>
                            <span class="Number_Student"> {{count(App\Models\Tip::all())}} </span>
                            <p>النصائح و الارشادات </p>
                        </div>

                    </div>--}}

                </div>
            </section>
            <!-- End Code Cart Student-->


    @stop
@section('footer')

    @stop
