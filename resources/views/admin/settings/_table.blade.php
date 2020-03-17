<table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
       {{--id="sample_3"--}} cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="all  text-center">#</th>
        <th class="all  text-center">الاسم</th>
        <th class="min-phone-l  text-center">القيمه باللغه العربيه</th>

            <th class="min-tablet text-center">خيارات</th>

    </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr>
            <td class="text-center">{!!$loop->iteration!!}</td>

            <td class="text-center">{!!$setting->slug!!}</td>
            <td class="text-center">


                @if($setting->type==2)

                    <img src="{!!asset( $setting->ar_value )!!}" width="100px">
                @else
                    {!!$setting->ar_value!!}
                @endif
            </td>



                <td colspan="1">
                    <div class="margin-bottom-5">
                        <a href="{{route('settings.show',[$setting->id])}}"
                           class="btn btn-sm blue btn-outline filter-submit margin-bottom">
                            <i class="fa fa-eye"></i> show</a>
                    </div>

                    <div class="margin-bottom-5">
                        <a href="{{route('settings.edit',[$setting->id])}}"
                           class="btn btn-sm green btn-outline filter-submit margin-bottom">
                            <i class="fa fa-pencil"></i> edit</a>
                    </div>
                </td>


        </tr>
    @endforeach
    </tbody>
</table>
