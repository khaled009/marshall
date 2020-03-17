<table class="table table-striped table-bordered  display example table-hover dt-responsive" width="100%"
       id="sample_3" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="all  text-center">#</th>
        <th class="all  text-center">الصورة</th>
        <th class="all  text-center">عنوان المنصة</th>
        <th class="all  text-center">الوصف</th>
        <th class="min-tablet text-center">الاعدادت</th>

    </tr>
    </thead>
    <tbody>
    @foreach($platforms as $platform)
        <tr>
            <td class="text-center">{!!$loop->iteration!!}</td>
            <td><img src="{!! asset($platform->image) !!}" width="100px" ></td>
            <td>{!!$platform->title!!}</td>
            <td title="{{ $platform->description }}">{!!str_limit($platform->description,50,'...')!!}</td>

            {!!Form::open( ['route' => ['platforms.destroy',$platform->id] ,'id'=>'delete-form'.$platform->id, 'method' => 'Delete']) !!}
            {!!Form::close() !!}
            <td colspan="1">
                <div class="margin-bottom-5">
                    <a href="{{route('platforms.edit',[$platform->id])}}"
                       class="btn btn-sm green btn-outline filter-submit margin-bottom">
                        <i class="fa fa-pencil-square"></i> تعديل </a>
                </div>

                <div class="margin-bottom-5">
                    <a onclick="Delete({{$platform->id}})" href="#"
                       class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                        <i class="fa fa-trash"></i> حذف</a>
                </div>
                <div class="margin-bottom-5">
                    <a href="{{route('platforms.show',[$platform->id])}}"
                       class="btn btn-sm blue btn-outline filter-submit margin-bottom">
                        <i class="fa fa-eye"></i> عرض</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
