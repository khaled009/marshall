@extends('layouts.app')
@section('title')  {{$title->title}} @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption ">
                        <i class="fa fa-globe"></i> {{$title->title}} - {{$student_name->name}}
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">

                    <div class="col-md-6"></div>
                    <div class="chat-section">
                        <ul class="chat">
                            @forelse($messages as $key)
                                @if($key->sender_id=='admin')
                                    <li class="other">
                                        <div class="msg">
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
                                <?php
                                $msg_id=$key->id
                                ?>
                            @empty
                                <center>لا يوجد رسائل</center>
                            @endforelse

                            <input type="hidden" value="{{$msg_id}}" class="last_id">

                        </ul>
                        <form class="form-chat" id="form-chat">
                            <textarea name="message" class="message_input" placeholder="هنا تكتب الرسالة ..."></textarea>
                            <a class="message_submit">
                                <img src="{{asset('/')}}send.png" alt=""/>
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
        $(document).ready(function () {
            setInterval(function(){
                getMessage();
            }, 3000);
        });

        $('.message_submit').on('click',function () {
            $.ajax({
                type:'POST',
                url:'{{asset('/')}}sendmsg',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id:'{{$title->id}}',
                    msg :$('.message_input').val(),
                    student : '{{$student_name->id}}'
                },
                success:function(data) {
                    var li='<li class="other">\n' +
                        '<div class="msg">\n' +
                        '<p>'+data.msg+'</p>\n' +
                        '</div>\n' +
                        '</li>';
                    $(".chat").append(li);
                    $('.message_input').val('');
                    $('.last_id').val(data.id);
                }
            });
        });
        function getMessage() {
            $.ajax({
                type:'get',
                url:'{{asset('/')}}messages/'+$('.last_id').val()+'/{{$title->id}}/{{$student_name->id}}',
                success:function(data) {
                    if (data.last!= null){
                        $('.last_id').val(data.last);
                    }
                    $(".chat").append(data.messages);

                }
            });
        }
    </script>
@stop



