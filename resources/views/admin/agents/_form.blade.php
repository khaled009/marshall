<div class="form-body">
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('name') ? ' has-error' : 'has-success' }} ">
        {!!Form::text('name',old('name'),['class'=>'form-control'])!!}
        <label for="form_control_1">الاسم</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('email') ? ' has-error' : 'has-success' }} ">
        {!!Form::email('email',old('email'),['class'=>'form-control'])!!}
        <label for="form_control_1"> البريد الالكتروني</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('mobile') ? ' has-error' : 'has-success' }} ">
        {!!Form::text('mobile',old('mobile'),['class'=>'form-control'])!!}
        <label for="form_control_1">الجوال</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('password') ? ' has-error' : 'has-success' }} ">
        {!!Form::password('password',['class'=>'form-control'])!!}
        <label for="form_control_1">كلمة المرور</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('password_confirmation') ? ' has-error' : 'has-success' }} ">
        {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
        <label for="form_control_1">تأكيد كلمة المرور</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('identify_image') ? ' has-error' : 'has-success' }}">
        @if(isset($coach))
            <img src="{!! asset($coach->identify_image) !!}" width="100px">
        @endif
        {!!Form::file('identify_image',['class'=>'form-control'])!!}
        <label for="form_control_1">صورة الهوية</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('club_image') ? ' has-error' : 'has-success' }}">
        @if(isset($coach))
            <img src="{!! asset($coach->club_image) !!}" width="100px">
        @endif
        {!!Form::file('club_image',['class'=>'form-control'])!!}
        <label for="form_control_1">صورة النادي</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('trainee_image') ? ' has-error' : 'has-success' }}">
        @if(isset($coach))
            <img src="{!! asset($coach->trainee_image) !!}" width="100px">
        @endif
        {!!Form::file('trainee_image',['class'=>'form-control'])!!}
        <label for="form_control_1">صورة التدريب</label>
    </div>

</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue btn_1">حفظ</button>
    <button type="reset" class="btn default btn_2">الغاء</button>
</div>
