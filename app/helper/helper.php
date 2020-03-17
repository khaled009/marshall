<?php
/* Developed By Ahmed Feisal*/

function saveImage($file, $folder)
{

    $fileName = (time() * rand(1, 99)) . '.' . $file->getClientOriginalExtension();

    $dest = public_path($folder);
    $file->move($dest, $fileName);

    return  'public/'. $folder . '/' . $fileName;
}

function showImage($image, $alt = null, $option = [])
{
    return Html::image(url($image), $alt, $option);
}

function years(){
    $current_year = date('Y');
    $range = range($current_year, $current_year+10);
    $years = array_combine($range, $range);
    return $years;
}

function set_active($path, $active = 'active') {


    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function send_notification($token, $msg)
{
    $api='AAAAuBpi290:APA91bGKi4uTHDbj69LgewuV07jNd7F1Iy65jsa4d8c3on4SsOBu7wWwb6BVdiUo4pWcl2VQpRK66kZJZ4-blus9yGiU7SXtG2UozSyjt6YaDdFYfz53eV_76OEcfdyu4ia52KixJ7C4GPcCotuyZM-ncPVru5dufQ';

    #prep the bundle
    $data = $msg ; // ['key' => 'value']; // data to send
#prep the bundle
    $fields = array
    (
        'to' => $token, //AllDevices
        'data' => $data,
    );



    $headers = array
    (
        'Authorization: key='. $api,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);

    curl_close( $ch );
    return json_decode($result);

}



function sendFCM($token, $data)
{
    $optionBuilder = new \LaravelFCM\Message\OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new \LaravelFCM\Message\PayloadNotificationBuilder($data['title']);//Title
    $notificationBuilder->setBody($data['body'])//Body
    ->setSound('default');

    $dataBuilder = new \LaravelFCM\Message\PayloadDataBuilder();
//    $dataBuilder->setData($data);
    $dataBuilder->addData($data);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    //$token = '';
    $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
    //$downstreamResponse->numberFailure();
}

function sendTopic($data){
    $notificationBuilder = new \LaravelFCM\Message\PayloadNotificationBuilder('my title');
    $notificationBuilder->setBody('Hello world')
        ->setSound('default');

    $notification = $notificationBuilder->build();
    $dataBuilder = new \LaravelFCM\Message\PayloadDataBuilder();
    $dataBuilder->setData($data);
    $data = $dataBuilder->build();
    $topic = new \LaravelFCM\Message\Topics();
    $topic->topic('status');

    $topicResponse = FCM::sendToTopic($topic, null, $notification, $data);

    $topicResponse->isSuccess();
    $topicResponse->shouldRetry();
    $topicResponse->error();
}

function filter_mobile_number($mob_num)
{
    $mob_num = strtr($mob_num, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    $first_3_val = substr($mob_num, 0, 3);
    $sixth_val = substr($mob_num, 0, 6);
    $first_val = substr($mob_num, 0, 1);
    $mob_number = 0;
    $val = 0;
    if ($sixth_val == "009665") {
        $val = null;
        $mob_number = substr($mob_num, 2, 12);
    } elseif ($sixth_val == "009660") {
        $val = 966;
        $mob_number = substr($mob_num, 6, 14);
    } elseif ($first_3_val == "+96") {
        $val = "966";
        $mob_number = substr($mob_num, 4);
    } elseif ($first_3_val == "966") {
        $val = null;
        $mob_number = $mob_num;
    } elseif ($first_val == "5") {
        $val = "966";
        $mob_number = $mob_num;
    } elseif ($first_3_val == "009") {
        $val = "9";
        $mob_number = substr($mob_num, 4);
    } elseif ($first_val == "0") {
        $val = "966";
        $mob_number = substr($mob_num, 1, 9);
    } else {
        $val = "966";
        $mob_number = $mob_num;
    }

    $real_mob_number = $val . $mob_number;

    return $real_mob_number;
}
function send_sms($phone, $msg)
{
    $UserName = "966504280417";
    $Password = "zxcZXC147";
    $Name = "aforeeh";
    $url = "https://www.hisms.ws/api.php?send_sms&username=".$UserName."&password=".$Password."&numbers=".$phone."& sender= ".$Name."& message= ".$msg."";
    $client = new \GuzzleHttp\Client();
    $result = $client->request('POST', $url);
//    dd($result);
    return $result;
    // $request_code = (integer)file_get_contents("http://sms.malath.net.sa/httpSmsProvider.aspx?username=takles&password=Asg132132&mobile=$phone&unicode=E&message=$msg&sender=Naqel.co");
    // if ($request_code == 0) {
    //     return true;
    // } else {
    //     return false;
    // }
}
