<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
</head>

<body dir="rtl" style="text-align: center;font-family: 'Cairo', sans-serif;background-color: #fff;
padding: 20px; font-size: 14px; line-height: 1.43;background-repeat: no-repeat;
background-size: cover;background-position: center;position: relative;margin: 0">
<div style="text-align: center">
    <img alt="logo" src="{{asset('public/logo.png')}}" style="width: 200px; padding: 20px">
</div>
<div style="position: relative;z-index: 1;max-width: 600px; margin: 30px auto 0;
 background-color: #fff; box-shadow: 0 2px 25px 2px rgba(108, 163, 200, 0.16);
 border-radius: 10px;overflow: hidden;">
    <div style="padding: 15px;">
        <h2 style="margin-top: 0;">أهلا بك</h2>
        <h4> عزيزي المستخدم {{$user->name}}</h4>
        <div style="color: #636363; font-size: 14px;">
            <p>كود اعادة تعيين كلمة المرور الخاصة بك علي التطبيق:</p>
        </div>
        <span style="padding: 8px 40px;background: linear-gradient(-90deg, #a0cdeb 0%, #19437f 100%);
            color: #fff; font-size: 15px; display: inline-block; margin: 20px 0;
            text-decoration: none;border-radius: 30px">{{$user->reset_code}}</span>
        <div style="color: #636363; font-size: 14px;">
            <p>مع تمنياتنا لكم بالتوفيق والنجاح.</p>
        </div>
        <div style="text-align: right">
            <h4 style="margin-bottom: 10px;">مساعدة؟</h4>
            <div style="color: #A5A5A5; font-size: 12px;">
                <p>هل لديك أي سؤال؟ يمكنك الرد على هذا البريد وأيضا يمكنك التواصل معنا عبر
                    <a href="mailto:{{$data['email']}}"
                       style="text-decoration: underline; color: #4B72FA;">{{$data['email']}}</a>
                </p>
            </div>
        </div>
    </div>

    <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        <div style="color: #A5A5A5; font-size: 10px;"> جميع الحقوق محفوظة ل {{$data['app_name']}}</div>
    </div>
</div>
</body>
</html>
