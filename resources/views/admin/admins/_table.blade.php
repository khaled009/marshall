<table class="table table-striped table-bordered table-hover dt-responsive display example" width="100%"
       id="sample_3" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="all  text-center">#</th>
        <th class="all  text-center">الصورة</th>
        <th class="all  text-center">الاسم</th>
        <th class="min-phone-l  text-center">الايميل</th>


        <th class="min-tablet text-center">الاعدادت</th>

    </tr>
    </thead>
    <tbody>
    @foreach($Admins as $Admin)
        <tr>
            <td class="text-center">{!!$loop->iteration!!}</td>
            <td><img src="{!! asset($Admin->image) !!}" width="100px" ></td>
            <td>{!!$Admin->name!!}</td>
            <td>{!!$Admin->email!!}</td>
            {!!Form::open( ['route' => ['admins.destroy',$Admin->id] ,'id'=>'delete-form'.$Admin->id, 'method' => 'Delete']) !!}
            {!!Form::close() !!}
            <td colspan="1">
                <div class="margin-bottom-5">
                    <a href="{{route('admins.edit',[$Admin->id])}}"
                       class="btn btn-sm green btn-outline filter-submit margin-bottom">
                        <i class="fa fa-pencil-square"></i> تعديل </a>
                </div>

                <div class="margin-bottom-5">
                    <a onclick="Delete({{$Admin->id}})" href="#"
                       class="btn btn-sm text-danger btn-outline filter-submit margin-bottom">
                        <i class="fa fa-trash"></i> حذف</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
