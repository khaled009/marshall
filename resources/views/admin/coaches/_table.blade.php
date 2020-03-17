<table class="table table-striped table-bordered  display example table-hover dt-responsive" width="100%"
       id="sample_3" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="all  text-center">#</th>
        <th class="all  text-center">الصورة</th>
        <th class="all  text-center">الاسم</th>
        <th class="all  text-center">البريد الالكتروني</th>
        <th class="all  text-center">رقم الجوال</th>
        <th class="min-tablet text-center">الاعدادت</th>

    </tr>
    </thead>
    <tbody>
    @foreach($model as $coach)
        <tr>
            <td class="text-center">{!!$loop->iteration!!}</td>
            <td><img src="{!! asset($coach->image) !!}" width="100px" ></td>
            <td>{!!$coach->name!!}</td>
            <td>{!!$coach->email!!}</td>
            <td>{!!$coach->mobile!!}</td>
          
            {!!Form::open( ['route' => ['coaches.destroy',$coach->id] ,'id'=>'delete-form'.$coach->id, 'method' => 'Delete']) !!}
            {!!Form::close() !!}
            <td colspan="1">
                <div class="margin-bottom-5">
                    <a href="{{route('coaches.edit',[$coach->id])}}"
                       class="btn btn-sm green btn-outline filter-submit margin-bottom">
                        <i class="fa fa-pencil-square"></i> تعديل </a>
                </div>

                <div class="margin-bottom-5">
                    <a onclick="Delete({{$coach->id}})" href="#"
                       class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                        <i class="fa fa-trash"></i> حذف</a>
                </div>
                <div class="margin-bottom-5">
                    <a href="{{route('coaches.show',[$coach->id])}}"
                       class="btn btn-sm blue btn-outline filter-submit margin-bottom">
                        <i class="fa fa-eye"></i> عرض</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
