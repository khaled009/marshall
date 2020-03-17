<div class="form-body">
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('name') ? ' has-error' : 'has-success' }} ">
        {!!Form::text('name',old('name'),['class'=>'form-control'])!!}
        <label for="form_control_1">إسم العضو</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('email') ? ' has-error' : 'has-success' }}">

        {!!Form::text('email',old('email'),['class'=>'form-control'])!!}
        <label for="form_control_1">البريد الالكترونى</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('password') ? ' has-error' : 'has-success' }}">
        {!!Form::password('password',['class'=>'form-control'])!!}
        <label for="form_control_1">كلمه المرور</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('password_confirmation') ? ' has-error' : 'has-success' }}">
        {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
        <label for="form_control_1">تأكيد كلمه المرور</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('image') ? ' has-error' : 'has-success' }}">
        @if(isset($Admin))
            <img src="{!! asset($Admin->image) !!}" width="100px">
        @endif
        {!!Form::file('image',['class'=>'form-control'])!!}
        <label for="form_control_1">الصوره</label>
    </div>

</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue btn_1">حفظ</button>
    <button type="reset" class="btn default btn_2">الغاء</button>
</div>
