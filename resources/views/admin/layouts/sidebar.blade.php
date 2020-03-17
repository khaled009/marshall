<!-- Start code sidebar -->
<div class="page-sidebar-wrapper" >
    <div class="page-sidebar navbar-collapse collapse" style=" margin-top: 2%;">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="{!!url('admin/home')!!}" class="nav-link ">
                    <i class="icon-home"></i><span class="title">الرئيسيه</span>
                </a>
            </li>

            <li class="nav-item start ">
                <a href="{!!route('contact.index')!!}" class="nav-link ">
                    <i class="icon-envelope"></i><span class="title">ارسال اشعار</span>
                </a>
            </li>

            {{-- ================= Admins================== --}}
            <li class="nav-item  {!! set_active('admins')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title"> المديرين </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('admins')!!}">
                        <a href="{!! asset('admin/admins')!!}" class="nav-link ">
                            <span class="title">كل  المديرين</span>
                            <span class="badge badge-success">{!! count(\App\Admin::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('admins.create')!!}">
                        <a href="{!!url('admin/admins/create')!!}" class="nav-link ">
                            <span class="title">اضافه مدير جديد </span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item  {!! set_active('players')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title"> اللأعبين </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('players')!!}">
                        <a href="{!! asset('admin/players')!!}" class="nav-link ">
                            <span class="title">كل اللأعبين</span>
                            <span class="badge badge-success">{!! count(\App\User::where('type','user')->get()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('players.create')!!}">
                        <a href="{!!url('admin/players/create')!!}" class="nav-link ">
                            <span class="title">اضافه لاعب  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('coaches')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title"> الوكلاء </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('coaches')!!}">
                        <a href="{!! asset('admin/coaches')!!}" class="nav-link ">
                            <span class="title">كل الوكلاء</span>
                            <span class="badge badge-success">{!! count(\App\User::where('type','agent')->get()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('agents.create')!!}">
                        <a href="{!!url('admin/agents/create')!!}" class="nav-link ">
                            <span class="title">اضافه وكيل  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item  {!! set_active('agents')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title"> المدربين </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('agents')!!}">
                        <a href="{!! asset('admin/coaches')!!}" class="nav-link ">
                            <span class="title">كل المدربين</span>
                            <span class="badge badge-success">{!! count(\App\User::where('type','coach')->get()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('coaches.create')!!}">
                        <a href="{!!url('admin/coaches/create')!!}" class="nav-link ">
                            <span class="title">اضافه مدرب  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('platforms')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title"> المنصات </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('platforms')!!}">
                        <a href="{!! asset('admin/platforms')!!}" class="nav-link ">
                            <span class="title">كل  المنصات</span>
                            <span class="badge badge-success">{!! count(\App\Models\Platform::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('platforms.create')!!}">
                        <a href="{!!url('admin/platforms/create')!!}" class="nav-link ">
                            <span class="title">اضافه منصة  جديدة </span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item start ">
                <a href="{!!route('contact.index')!!}" class="nav-link ">
                    <i class="icon-envelope-letter"></i><span class="title">الرسائل</span>
                </a>
            </li>
    {{--
            <li class="nav-item  {!! set_active('relations')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title"> صلات القرابة </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('relations')!!}">
                        <a href="{!! asset('admin/relations')!!}" class="nav-link ">
                            <span class="title">كل  الصلات</span>
                            <span class="badge badge-success">{!! count(\App\Models\Relation::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('relations.create')!!}">
                        <a href="{!!url('admin/relations/create')!!}" class="nav-link ">
                            <span class="title">اضافه صلة جديدة </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('defaults')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-notebook"></i>
                    <span class="title"> السلوكيات المبدائية </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('defaults')!!}">
                        <a href="{!! asset('admin/defaults')!!}" class="nav-link ">
                            <span class="title">كل  السلوكيات</span>
                            <span class="badge badge-success">{!! count(\App\Models\Defaults::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('defaults.create')!!}">
                        <a href="{!!url('admin/defaults/create')!!}" class="nav-link ">
                            <span class="title">اضافه سلوك  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('parents')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title"> أولياء الأمر </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('parents')!!}">
                        <a href="{!! asset('admin/parents')!!}" class="nav-link ">
                            <span class="title">كل  أولياء الأمر</span>
                            <span class="badge badge-success">{!! count(\App\User::where('type','parent')->get()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('parents.create')!!}">
                        <a href="{!!url('admin/parents/create')!!}" class="nav-link ">
                            <span class="title">اضافه ولي أمر  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('children')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title"> الأبناء و الأطفال </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('children')!!}">
                        <a href="{!! asset('admin/children')!!}" class="nav-link ">
                            <span class="title">كل  الأطفال</span>
                            <span class="badge badge-success">{!! count(\App\User::where('type','child')->get()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('children.create')!!}">
                        <a href="{!!url('admin/children/create')!!}" class="nav-link ">
                            <span class="title">اضافه طفل  جديد </span>
                        </a>
                    </li>


                </ul>
            </li>


            <li class="nav-item  {!! set_active('rewards')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-shield"></i>
                    <span class="title"> المكأفات </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('rewards')!!}">
                        <a href="{!! asset('admin/rewards')!!}" class="nav-link ">
                            <span class="title">كل  المكأفات</span>
                            <span class="badge badge-success">{!! count(\App\Models\Reward::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('rewards.create')!!}">
                        <a href="{!!url('admin/rewards/create')!!}" class="nav-link ">
                            <span class="title">اضافه مكأفة  جديدة </span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item  {!! set_active('tips')!!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-note"></i>
                    <span class="title"> النصائح و الارشادات </span>
                    <span class="selected"></span>

                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  {!! set_active('tips')!!}">
                        <a href="{!! asset('admin/tips')!!}" class="nav-link ">
                            <span class="title">كل  النصائح</span>
                            <span class="badge badge-success">{!! count(\App\Models\Tip::all()) !!}</span>
                        </a>
                    </li>


                    <li class="nav-item  {!!set_active('tips.create')!!}">
                        <a href="{!!url('admin/tips/create')!!}" class="nav-link ">
                            <span class="title">اضافه نصيحة  جديدة </span>
                        </a>
                    </li>


                </ul>
            </li>
--}}

            <li class="nav-item start ">
                <a href="{!!url('admin/settings')!!}" class="nav-link ">
                    <i class="icon-layers"></i><span class="title">الاعدادات العامة</span>
                </a>
            </li>


        </ul>
    </div>
</div>
<!-- End code sidebar -->
