<div class="form-body">
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('title') ? ' has-error' : 'has-success' }} ">
        {!!Form::text('title',old('title'),['class'=>'form-control'])!!}
        <label for="form_control_1">عنوان المنصة</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('description') ? ' has-error' : 'has-success' }} ">
        {!!Form::textarea('description',old('description'),['class'=>'form-control'])!!}
        <label for="form_control_1">الوصف</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('attempts') ? ' has-error' : 'has-success' }} ">
        {!!Form::number('attempts',old('attempts'),['class'=>'form-control'])!!}
        <label for="form_control_1">عدد المحاولات</label>
    </div>




    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('image') ? ' has-error' : 'has-success' }}">
        @if(isset($platform))
            <img src="{!! asset($platform->image) !!}" width="100px">
        @endif
        {!!Form::file('image',['class'=>'form-control'])!!}
        <label for="form_control_1">الصوره</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('image') ? ' has-error' : 'has-success' }}">
        @if(isset($platform))
            <video width="320" height="240" controls>
                <source src="{{ asset($platform->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        {!!Form::file('video',['class'=>'form-control'])!!}
        <label for="form_control_1">فيديو توضيحي</label>
    </div>

</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue btn_1">حفظ</button>
    <button type="reset" class="btn default btn_2">الغاء</button>
</div>
