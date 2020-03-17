<!DOCTYPE html >
<html dir="rtl" xmlns="https://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="admin panel " name="description" />
    <meta content="auth" name="ahmed feisal" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{url('/public')}}/manger/img/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <title> @yield('title')</title>
    <link href="{{url('/public')}}/manger/css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public')}}/manger/css/reset.min.css">
    <link href="{{url('/public')}}/manger/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet prefetch' href='https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css'>
    <link href="{{url('/public')}}/manger/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('/public')}}/manger/css/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/public')}}/manger/css/jquery.dataTables.min.css" rel="stylesheet" >
    <link href="{{url('/public')}}/manger/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="{{url('/public')}}/manger/css/jquery.dataTables.css" rel='stylesheet prefetch'>
    <link href="{{url('/public')}}/manger/css/responsive.dataTables.min.css" rel='stylesheet prefetch'>
    <link href="{{url('/public')}}/manger/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('/public')}}/manger/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/public')}}/manger/css/multi-images.css" rel="stylesheet">
    <link href="{{url('/public')}}/manger/css/stylee.css" rel="stylesheet" type="text/css" > </link>
    <link href="{{url('/public')}}/manger/css/style.css" rel="stylesheet">
    <link href="{{url('/public')}}/manger/css/normalize.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="{{url('/public')}}/manger/js/html5shiv.min.js"></script>
    <script src="{{url('/public')}}/manger/js/respond.min.js"></script>

    <script src="{{url('/public')}}/manger/js/multi-images.js"></script>
    @yield('header')

</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md" onload="startTime()">

@include('admin.layouts.navbar')

<div class="clearfix"> </div>

<!-- Start code Page container -->
<div class="page-container">

@include('admin.layouts.sidebar')

<!-- Start code Page contant -->
    <div class="page-content-wrapper">
        <div class="page-content">
            @include('flash::message')
            @yield('content')
        </div>
    </div>

    <!-- Start code Page contant -->
</div>
<!-- End code Page container -->


<!-- Start code page-footer -->
<div class="page-footer">
    <div class="page-footer-inner">
        <span style="width: 50%;float: right;"> حقوق التصميم والبرمجة محفوظة لدي شركة <a href="#">الواحة للبرمجيات و تقنية المعلومات</a> </span>

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- End code page-footer -->


<script src="{{url('/public')}}/manger/js/jquery-3.2.0.min.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<script src="{{url('/public')}}/manger/js/bootstrap.min.js"></script>
<script src="{{url('/public')}}/manger/js/Chart.min.js"></script>
<script src="{{url('/public')}}/manger/js/app.min.js" type="text/javascript"></script>
<script src="{{url('/public')}}/manger/js/layout.min.js" type="text/javascript"></script>
<script src='{{url('/public')}}/manger/js/jquery.dataTables.js'></script>
<script src='{{url('/public')}}/manger/js/dataTables.responsive.min.js'></script>
<script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="{{url('/public')}}/manger/js/index.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    function goBack() {
        window.history.back();
    }
</script>
<script>
    $(document).ready(function(){

        'use strict';


        // Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        var thumbnail = '<div class="image ">';
                        thumbnail += '<img src="' + event.target.result + '"/>';
                        thumbnail += '<span class="btn removeButton">' + '<i class="fas fa-times"></i>' + '</span>';
                        thumbnail += '</div>';
                        $(thumbnail).appendTo(placeToInsertImagePreview);

                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {

            imagesPreview(this, 'div.gallery');


        });


        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).next().find('.preview').attr('src', e.target.result);
                    $("<span class=\"remove\">x</span>" + "</span>").insertAfter(".preview");
                    $(".remove").click(function () {
                        $(this).prev(".preview").attr('src', '');
                        $(this).remove();
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".joint").change(function () {
            readURL(this);
        });
    });

</script>
@yield('footer')
</body>
</html>
