@extends('admin.layouts.app')
@section('title')الوكلاء @endsection
@section('header')@endsection
@section('content')

    <div class="page-head">
        <div class="page-title">
            <h1 class="text-center">الوكلاء<hr></h1>
        </div>
    </div>

    <!-- Start Code Table Studeصnt-->
    <section class="Table">
        <div class="row">
            @include('admin.coaches._table')
        </div>
    </section>
    <!-- eND Code Table Student-->



@endsection
@section('footer')
    <script>
        function Delete(id) {
            var item_id=id;

            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذا الوكيل ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    document.getElementById('delete-form'+item_id).submit();
                }
                else{
                    swal("تم الإلغاء", "حذف الوكيل تم الغاؤه", "error");
                }
            });
        };
    </script>
@stop
