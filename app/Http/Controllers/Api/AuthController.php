<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Http\Requests\Api\ActiveRequest;
use App\Http\Requests\Api\ChangePassword;
use App\Http\Requests\Api\ChildLogin;
use App\Http\Requests\Api\ForgetRequest;
use App\Http\Requests\Api\ResetRequest;
use App\Http\Requests\Api\TypeRegisterRequest;
use App\Http\Resources\CoachResource;
use App\Mail\ResetMail;
use App\User;
use App\Models\Device;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\Api\UpdateProfile;
use App\Http\Requests\Api\StoreRegister;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserResource;

class AuthController extends MasterApiController
{
    /* Developed By Ahmed Feisal*/

    public function authenticate(LoginRequest $request)
    {

        $credentials = $request->only('mobile', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'من فضلك تأكد من رقم الجوال و كلمة المرور','status'=>'fails'], 400);
            }
            $user = User::whereMobile($request->mobile)->first();

            if (count($user->devices->where('device_token',$request->device_token))==0){

                $dev['user_id']=$user->id;
                $dev['device_token']=$request->device_token;
                $dev['device_type']=$request->device_type;
                $device=Device::create($dev);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token','status'=>'fails'], 403);
        }


        $user= new UserResource($user);
        return response()->json(['data'=>$user,'status'=>'ok'],200);
    }

    public function register(StoreRegister $request)
    {
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }
        $requests['type']='user';
        $requests['code']=mt_rand(100000, 999999);

        $user= User::create($requests);

        send_sms(filter_mobile_number($user->mobile),'كود التحقق لتطبيق أكاديمية مارشال :'.$user->code);
        if (count($user->devices->where('device_token',$request->device_token))==0){

            $dev['user_id']=$user->id;
            $dev['device_token']=$request->device_token;
            $dev['device_type']=$request->device_type;
            $device=Device::create($dev);
        }

        $data= new UserResource($user->fresh());
//        $data['token']=$token;

        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function register_type(TypeRegisterRequest $request,$type)
    {
        if (!in_array($type,['coach','agent'])){
            return response()->json(['data'=>null,'message'=>'محاولة الوصول الي محتوي غير موجود','status'=>'fails'],404);

        }
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }
        if ($request->hasFile('identify_image')) {

            $requests['identify_image'] = saveImage($request->identify_image, with(new User)->getTable());
        }
        if ($request->hasFile('club_image')) {

            $requests['club_image'] = saveImage($request->club_image, with(new User)->getTable());
        }
        if ($request->hasFile('trainee_image')) {

            $requests['trainee_image'] = saveImage($request->trainee_image, with(new User)->getTable());
        }
        $requests['type']=$type;
        $requests['code']=/*mt_rand(100000, 999999)*/'111111';
        $user= User::create($requests);

        if (count($user->devices->where('device_token',$request->device_token))==0){

            $dev['user_id']=$user->id;
            $dev['device_token']=$request->device_token;
            $dev['device_type']=$request->device_type;
            $device=Device::create($dev);
        }

        $data= new CoachResource($user->fresh());
//        $data['token']=$token;

        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function active(ActiveRequest $request){
        $user=$this->user;
        if ($request->code != $user->code){
            return response()->json(['data'=>null,'message'=>'كود التفعيل خطأ','status'=>'ok'],405);
        }
        $user->active='active';
        $user->code=null;
        $user->update();

        $data= $user->type=='user'?new UserResource($user):new CoachResource($user);

        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function getAuthenticatedUser()
    {
        $user = $this->user;
        if ($user->type=='user'){
            $data= new UserResource($user);
        }else{
            $data= new CoachResource($user);
        }
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function editUserProfile(UpdateProfile $request){

        $user = $this->user;
        $requests=$request->except('password','image');


        if (!is_null($request->has('password'))) {
            $requests['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }

        $user->update($requests);
        $user= new UserResource($user);
        return response()->json(['message'=>'تم التعديل بنجاح','data'=>$user,'status'=>'ok'], 200);

    }

    public function change_password(ChangePassword $request){
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            $message='من فضلك تأكد من كلمة المرور القديمة';
            if (app()->getLocale()=='en'){
                $message='old password is invalid';
            }
            return response()->json(['message' => $message,'status'=>'fails'], 400);

        }
        $requests['password'] = Hash::make($request->new_password);
        $user->update($requests);

        $data= new UserResource($user);
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function forget(ForgetRequest $request){
        $user=User::whereMobile($request->mobile)->first();
        if (is_null($user)){
            return response()->json(['message'=>'هذا الايميل غير موجود !','status'=>'fails'], 405);

        }
        $reset=mt_rand(100000, 999999);
        $user->reset_code=$reset;
        $user->save();

        send_sms(filter_mobile_number($user->mobile),'كود استرجاع كلمة المرور لتطبيق أكاديمية مارشال :'.$user->reset_code);

        return response()->json(['message'=>'تم ارسال كود الاسترجاع بنجاح !' ,'code'=>$reset,'status'=>'ok'], 200);
    }

    public function reset(ResetRequest $request){
        $user=User::where('mobile',$request->mobile)->where('reset_code',$request->code)->first();
        if (is_null($user)){
            return response()->json(['message'=>'هذا الكود غير موجود !','status'=>'fails'], 405);

        }
        $user->password = Hash::make($request->password);
        $user->reset_code=null;
        $user->update();

        if ($user->type=='user'){
            $user= new UserResource($user);
        }else{
            $user= new CoachResource($user);
        }
        return response()->json(['message'=>'تم التعديل بنجاح','data'=>$user,'status'=>'ok']);

    }


}
