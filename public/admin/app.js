$('.summernote').summernote({
    lang: 'ar-AR',
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});
$('.icp-auto').iconpicker({
    //...
    title: 'اختر الايقونه',
    icons: $.merge([
            'glyphicon-home',
            'glyphicon-repeat',
            'glyphicon-search',
            'glyphicon-arrow-left',
            'glyphicon-arrow-right',
            'glyphicon-star'],
        $.iconpicker.defaultOptions.icons),
    fullClassFormatter: function(val){
        if(val.match(/^fa-/)){
            return 'fa '+val;
        }else{
            return 'glyphicon '+val;
        }
    }
});
$(document).on('click','.add-input',function(){
var inputType = {
        'select': 'اختيار',
        'textarea': 'مساحه كتابه كبيره',
        'checkbox': 'علامه صح',
        'color': 'لون',
        'date': 'تاريخ',
        'email': 'ايميل',
        'file': 'ملف',
        'number': 'رقم',
        'password': 'كلمه مرور',
        'radio': 'نقطه ',
        'text': 'منطه كتابه ',
        'time': 'وقت',
    },
    options = '<option selected disabled> اختر نوع الحقل</option>';
$.each(inputType, function (key,value) {
    options += '<option value="' + key + '"> ' + value + '</option>';
});

var newInput = function (i) {

    return '        <div class="form-body col-xs-12"  style="display:none;">\n' +
        '            <div class="col-xs-2">\n' +
        '                <div class="form-group form-md-line-input form-md-floating-label ">\n' +
        '        <select name="inputs['+i+'][input]" class="form-control">'+options+' </select>     \n' +
        '                    <label for="form_control_1">نوع الحقل</label>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-xs-3">\n' +
        '                <div class="form-group form-md-line-input form-md-floating-label">\n' +
        '                 <input type="text" name="inputs['+i+'][ar_label]" class="form-control">   \n' +
        '                    <label for="form_control_1">اسم الحقل بالعربى</label>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-xs-3">\n' +
        '                <div class="form-group form-md-line-input form-md-floating-label ">\n' +
        '                 <input type="text" name="inputs['+i+'][en_label]" class="form-control">   \n' +
        '                    <label for="form_control_1">اسم الحقل بالانجليزى</label>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-xs-2">\n' +
        '                <div class="form-group form-md-line-input form-md-floating-label">\n' +
        '                 <input type="text" name="inputs['+i+'][value]" class="form-control">   \n' +
        '                    <label for="form_control_1">القيمه</label>\n' +
        '                </div>\n' +

        '            </div>\n' +
        '            <div class="col-xs-1">\n' +
        '                <div class="form-group form-md-line-input form-md-floating-label">\n' +
        '                 <a   class="delete-input btn btn-danger"> <i class="fa' +
        ' fa-trash">حذف</i> ' +
        '</a>  ' +
        '\n' +
        '                </div>\n' 

}
    var exists=$('.inputs').children().length ;
    $(newInput(exists)).appendTo('.inputs').show('slow');
});

$(document).on('click','.delete-input',function () {


    var body= $(this).closest('.form-body');
        body.remove();
});



$(".kv-explorer").fileinput({
    // 'theme': 'explorer-fa',
    theme: 'fa',


    language: 'ar',
    showUpload: false,
    overwriteInitial: false,
    initialPreviewAsData: true
});
$(".kv-explorer1").fileinput({
    'theme': 'explorer-fa',
    // theme: 'fa',


    language: 'ar',
    showUpload: false,
    overwriteInitial: false,
    initialPreviewAsData: true
});



