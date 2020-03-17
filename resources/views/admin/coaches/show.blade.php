@extends('admin.layouts.app')
@section('title')  {{$coach->name}} @endsection
@section('header')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption ">
                        <i class="fa fa-globe"></i> بيانات عامة
                    </div>
                    <div class="tools"></div>
                </div>

                <div class="portlet-body">


                    <table class="table table-striped table-hover">
                        <tbody>
                        <!-- User Id Field -->
                        <tr>
                            <td>الاسم</td>
                            <td>{{$coach->name}}</td>
                        </tr>
                        <tr>
                            <td>البريد الكتروني</td>
                            <td>{{$coach->email}}</td>
                        </tr>

                        <tr>
                            <td>رقم الجوال</td>
                            <td>{{$coach->mobile}}</td>
                        </tr>

                        <tr>
                            <td> صورة الهوية</td>
                            <td><img src="{{asset($coach->identify_image)}}" width="200px"></td>
                        </tr>

                        <tr>
                            <td> صورة النادي</td>
                            <td><img src="{{asset($coach->club_image)}}" width="200px"></td>
                        </tr>

                        <tr>
                            <td> صورة التدريب</td>
                            <td><img src="{{asset($coach->trainee_image)}}" width="200px"></td>
                        </tr>



                        <!-- Amount Field -->

                        </tbody>
                    </table>
                </div>


                    {{--<div class="portlet-title">
                        <div class="caption ">
                            <i class="fa fa-comment"></i> الأطفال
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered  display  table-hover dt-responsive" width="100%"
                               id="sample_3" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all  text-center">#</th>
                                <th class="all  text-center">الصورة</th>
                                <th class="all  text-center">الاسم</th>
                                <th class="all  text-center">النقاط</th>
                                <th class="all  text-center">الجنس</th>
                                <th class="min-tablet text-center">الاعدادت</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coach->children as $child)
                                <tr>
                                    <td class="text-center">{!!$loop->iteration!!}</td>
                                    <td class="text-center"><img src="{!! asset($child->image) !!}" width="100px" ></td>
                                    <td class="text-center">{!!$child->name!!}</td>
                                    <td class="text-center">{!!$child->points!!}</td>
                                    <td class="text-center">{!!$child->gender=='male'?'ذكر':'أنثي'!!}</td>

                                    {!!Form::open( ['route' => ['children.destroy',$child->id] ,'id'=>'child-delete-form'.$child->id, 'method' => 'Delete']) !!}
                                    {!!Form::close() !!}
                                    <td class="text-center" colspan="1">
                                        <div class="margin-bottom-5">
                                            <a href="{{route('children.edit',[$child->id])}}"
                                               class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-pencil-square"></i> تعديل </a>
                                        </div>

                                        <div class="margin-bottom-5">
                                            <a onclick="DeleteChild({{$child->id}})" href="#"
                                               class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-trash"></i> حذف</a>
                                        </div>
                                        <div class="margin-bottom-5">
                                            <a href="{{route('children.show',[$child->id])}}"
                                               class="btn btn-sm blue btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-eye"></i> عرض</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        

                    </div>

                    <div class="portlet-title">
                        <div class="caption ">
                            <i class="fa fa-address-book"></i> السلوكيات
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered  display  table-hover dt-responsive" width="100%"
                               id="sample_3" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all  text-center">#</th>
                                <th class="all  text-center">الاسم</th>
                                <th class="all  text-center">النقاط</th>
                                <th class="all  text-center">النوع</th>
                                <th class="min-tablet text-center">الاعدادت</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coach->behaviors as $behavior)
                                <tr>
                                    <td class="text-center">{!!$loop->iteration!!}</td>
                                    <td class="text-center">{!!$behavior->title!!}</td>
                                    <td class="text-center">{!!$behavior->points!!}</td>
                                    <td class="text-center">{!!$behavior->type=='good'?'جيد':'سيئ'!!}</td>

                                    {!!Form::open( ['route' => ['behaviors.destroy',$behavior->id] ,'id'=>'behavior-delete-form'.$behavior->id, 'method' => 'Delete']) !!}
                                    {!!Form::close() !!}
                                    <td class="text-center" colspan="1">
                                        <div class="margin-bottom-5">
                                            <a href="{{route('behaviors.edit',[$behavior->id])}}"
                                               class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-pencil-square"></i> تعديل </a>
                                        </div>

                                        <div class="margin-bottom-5">
                                            <a onclick="DeleteBehavior({{$behavior->id}})" href="#"
                                               class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-trash"></i> حذف</a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                    </div>

                <div class="portlet-title">
                        <div class="caption ">
                            <i class="fa fa-award"></i> المكأفات
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered  display  table-hover dt-responsive" width="100%"
                               id="sample_3" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all  text-center">#</th>
                                <th class="all  text-center">الاسم</th>
                                <th class="all  text-center">النقاط</th>
                                <th class="min-tablet text-center">الاعدادت</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coach->rewards as $award)
                                <tr>
                                    <td class="text-center">{!!$loop->iteration!!}</td>
                                    <td class="text-center">{!!$award->name!!}</td>
                                    <td class="text-center">{!!$award->points!!}</td>

                                    {!!Form::open( ['route' => ['rewards.destroy',$award->id] ,'id'=>'reward-delete-form'.$award->id, 'method' => 'Delete']) !!}
                                    {!!Form::close() !!}
                                    <td class="text-center" colspan="1">
                                        <div class="margin-bottom-5">
                                            <a href="{{route('rewards.edit',[$award->id])}}"
                                               class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-pencil-square"></i> تعديل </a>
                                        </div>

                                        <div class="margin-bottom-5">
                                            <a onclick="DeleteReward({{$award->id}})" href="#"
                                               class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                                                <i class="fa fa-trash"></i> حذف</a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                    </div>
--}}

            </div>
<button onclick="goBack()" class="btn btn-info btn_1"> للعودة <i class="fa fa-arrow-left" aria-hidden="true"></i>  </button>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>

@endsection
@section('footer')

    <script>
        function DeleteChild(id) {
            var item_id=id;

            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذا الطفل ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    document.getElementById('child-delete-form'+item_id).submit();
                }
                else{
                    swal("تم الإلغاء", "حذف الطفل تم الغاؤه", "error");
                }
            });
        };
        function DeleteBehavior(id) {
            var item_id=id;

            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذا السلوك ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    document.getElementById('behavior-delete-form'+item_id).submit();
                }
                else{
                    swal("تم الإلغاء", "حذف السلوك تم الغاؤه", "error");
                }
            });
        };
        function DeleteReward(id) {
            var item_id=id;

            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذه المكأفة ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    document.getElementById('reward-delete-form'+item_id).submit();
                }
                else{
                    swal("تم الإلغاء", "حذف المكأفة تم الغاؤه", "error");
                }
            });
        };
    </script>
@endsection


