@extends('admin.layouts.app')
@section('title')  رسائل تواصل معنا @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption ">
                        <i class="fa fa-globe"></i> {{$user->name}}
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">

                    <div class="col-md-6"></div>
                    <div class="chat-section">
                        <ul class="chat">
                            @forelse($messages as $key)
                                @if($key->type=='admins')
                                    <li class="other">
                                        <div class="mssage">
                                            <p>{{$key->message}}</p>
                                        </div>
                                    </li>
                                @else
                                    <li class="self">
                                        <div class="msg">
                                            <p>{{$key->message}}</p>
                                        </div>
                                    </li>
                                @endif

                            @empty
                                <center>لا يوجد رسائل</center>
                            @endforelse

                        </ul>
                        <form class="form-chat" id="form-chat">
                            <textarea name="message" class="message_input" placeholder="هنا تكتب الرسالة ..."></textarea>
                            <a class="message_submit">
                                <img src="{{asset('/public')}}/send.png" alt=""/>
                            </a>
                        </form>
                    </div>
                    <button onclick="goBack()" class="btn btn-info btn_1"> للعودة <i class="fa fa-arrow-left" aria-hidden="true"></i>  </button>

                </div>


            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>

@endsection
@section('footer')

    <script>
        window.Laravel = {
            'csrfToken': '{{ csrf_token() }}',
        };
        $('.message_submit').on('click',function () {
            $.ajax({
                type:'POST',
                url:'{{ route('contact.sendmsg') }}',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id:'{{$con->id}}',
                    msg :$('.message_input').val(),
                },
                success:function(data) {
                    var li='<li class="other">\n' +
                        '<div class="mssage">\n' +
                        '<p>'+data.msg+'</p>\n' +
                        '</div>\n' +
                        '</li>';
                    $(".chat").append(li);
                    $('.message_input').val('');
                }
            });
        });
    </script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="//{{ Request::getHost() }}:6006/socket.io/socket.io.js"></script>
    {{--        <script src="{{ asset('/js/echo.js') }}"></script>--}}
    <script>
        window.Echo.channel('test-event')
            .listen('ExampleEvent', (e) => {
                console.log(e);
            });
    </script>
@stop



