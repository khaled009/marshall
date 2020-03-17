<div class="form-body">


@if(in_array($setting->type,[0,3]))


            <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('value') ? ' has-error' : 'has-success' }} ">
                @if($setting->type==0)
                    {!!Form::text("ar_value",Null,['class'=>'form-control'])!!}
                @else
                    {!!Form::textarea("ar_value",Null,['class'=>'form-control '])!!}

                @endif
                    <label for="form_control_1">
                        {!!$setting->slug!!}  باللغه العربية
                    </label>

            </div>
        <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('value') ? ' has-error' : 'has-success' }} ">
                @if($setting->type==0)
                    {!!Form::text("en_value",Null,['class'=>'form-control'])!!}
                @else
                    {!!Form::textarea("en_value",Null,['class'=>'form-control '])!!}

                @endif
                    <label for="form_control_1">
                        {!!$setting->slug!!}  باللغه الانجليزية
                    </label>

            </div>


            @elseif($setting->type==1)
                {!!Form::number("ar_value",Null,['class'=>'form-control'])!!}
            <label for="form_control_1">
                {!!$setting->slug!!} باللغة العربية
            </label>
        {!!Form::number("en_value",Null,['class'=>'form-control'])!!}
            <label for="form_control_1">
                {!!$setting->slug!!} باللغة الانجليزية
            </label>
            @elseif($setting->type==2)
                <img src="{!! asset($setting->ar_value) !!}" width="100px">
                {!!Form::file("ar_value",['class'=>'form-control'])!!}
            <label for="form_control_1">
                {!!$setting->slug!!}
            </label>
    @else
        {!!Form::text('ar_value',old('ar_value'),['class'=>'form-control '])!!}

        <label for="form_control_1">{!!$setting->slug!!} باللغه العربيه</label>
@endif




        <div class="form-actions noborder">
        <button type="submit" class="btn blue btn_1">حفظ</button>
        <button type="reset" class="btn default btn_2" onclick="goBack()">الغاء</button>
    </div>
</div>
