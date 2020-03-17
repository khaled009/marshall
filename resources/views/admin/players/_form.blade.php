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

    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('age') ? ' has-error' : 'has-success' }} ">
        {!!Form::number('age',old('age'),['class'=>'form-control'])!!}
        <label for="form_control_1">العمر</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('height') ? ' has-error' : 'has-success' }} ">
        {!!Form::number('height',old('height'),['class'=>'form-control'])!!}
        <label for="form_control_1">الطول</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('weight') ? ' has-error' : 'has-success' }} ">
        {!!Form::number('weight',old('weight'),['class'=>'form-control'])!!}
        <label for="form_control_1">الوزن</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('position') ? ' has-error' : 'has-success' }} ">
        {!!Form::text('position',old('position'),['class'=>'form-control'])!!}
        <label for="form_control_1"> المركز المفضل</label>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('foot') ? ' has-error' : 'has-success' }} ">
        {!!Form::select('foot',['right'=>'اليمين','left'=>'اليسري','both'=>'كلاهما'],old('foot'),['class'=>'form-control','required'=>'required'])!!}
        <label for="form_control_1"> المركز المفضل</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('password') ? ' has-error' : 'has-success' }} ">
        {!!Form::password('password',['class'=>'form-control'])!!}
        <label for="form_control_1">كلمة المرور</label>
    </div>

    <div class="form-group form-md-line-input form-md-floating-label  {{ $errors->has('password_confirmation') ? ' has-error' : 'has-success' }} ">
        {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
        <label for="form_control_1">تأكيد كلمة المرور</label>
    </div>


    <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('image') ? ' has-error' : 'has-success' }}">
        @if(isset($parent))
            <img src="{!! asset($parent->image) !!}" width="100px">
        @endif
        {!!Form::file('image',['class'=>'form-control'])!!}
        <label for="form_control_1">الصوره</label>
    </div>

</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue btn_1">حفظ</button>
    <button type="reset" class="btn default btn_2">الغاء</button>
</div>
