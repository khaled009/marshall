<table class="table table-striped table-bordered  display example table-hover dt-responsive" width="100%"
       id="sample_3" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="all  text-center">#</th>
        <th class="all  text-center">الاسم</th>
        <th class="all  text-center">البريد الالكتروني</th>
        <th class="all  text-center">رقم الجوال</th>
        <th class="all  text-center">نوع المستخدم</th>
        <th class="all  text-center">اسم اللاعب</th>
        <th class="min-tablet text-center">الاعدادت</th>

    </tr>
    </thead>
    <tbody>
    @foreach($model as $message)
        <tr>
            <td class="text-center">{!!$loop->iteration!!}</td>
            <td>{!!$message->user->name!!}</td>
            <td>{!!$message->user->email!!}</td>
            <td>{!!$message->user->mobile!!}</td>
            <td>
                @switch($message->user->type)
                    @case('user')
                    لاعب
                    @break
                    @case('coach')
                    مدرب
                    @break
                    @case('agent')
                    وكيل
                    @break

                    @endswitch
            </td>

            <td class="text-center">
                @if(is_null($message->player))
                    رسالة تواصل معنا
                    @else
                    <a target="_blank" href="{{ route('players.show',$message->player_id) }}">{{ $message->player->name }}</a>
                @endif
            </td>
            {!!Form::open( ['route' => ['contact.destroy',$message->id] ,'id'=>'delete-form'.$message->id, 'method' => 'Delete']) !!}
            {!!Form::close() !!}
            <td colspan="1">


                <div class="margin-bottom-5">
                    <a onclick="Delete({{$message->id}})" href="#"
                       class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                        <i class="fa fa-trash"></i> حذف</a>
                </div>
                <div class="margin-bottom-5">
                    <a href="{{route('contact.show',[$message->id])}}"
                       class="btn btn-sm blue btn-outline filter-submit margin-bottom">
                        <i class="fa fa-eye"></i> عرض</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
