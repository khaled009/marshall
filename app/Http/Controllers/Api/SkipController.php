<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Http\Requests\Api\FilterPlayer;
use App\Http\Resources\ArticalResource;
use App\Http\Resources\FavoritesArticlesResource;
use App\Http\Resources\FavoritesDoctorsResource;
use App\Http\Resources\NotificationCollection;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\RelationsCollection;
use App\Http\Resources\SingleArtical;
use App\Http\Resources\UniversitiesResource;
use App\Http\Resources\user\PlatformResource;
use App\Http\Resources\UserResource;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Platform;
use App\Models\Relation;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContact;
use App\Http\Controllers\Controller;
use App\Http\Resources\IntrosResource;
use App\Http\Resources\CountriesResource;
use App\Http\Resources\CitiesResource;
use App\Http\Resources\TermsResource;
use App\Http\Resources\DoctorsResource;
use App\Http\Resources\LocationsResource;
use App\Models\Intro;
use App\Models\Country;
use App\Models\City;
use App\Models\Term;
use App\Models\Help;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Branche;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class SkipController extends MasterApiController
{
    /* Developed By Ahmed Feisal*/

    public function platforms(){
        $platforms=Platform::all();

        $data=PlatformResource::collection($platforms);
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function platform($id){
        $platform=Platform::find($id);
        if (is_null($platform)){
            return response()->json(['data'=>'المحتوي غير موجود','status'=>'fails'],404);

        }
        $data=new PlatformResource($platform);
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function bast_players(){
        $players=User::where('type','user')->orderBy('rates')->get();
        $status='ok';
        $data= PlayerResource::collection($players);
        return response()->json(compact('data','status'),200);
    }
    public function filter(FilterPlayer $request){
        $where=$this->setTime($request);
        $players=$this->rows($where);
        $status='ok';
        $data= PlayerResource::collection($players);
        return response()->json(compact('data','status'),200);
    }

    public function setTime($request){
    $where=[];
    switch ($request->filter) {
        case "TODAY":
            $time=new Carbon('TODAY');
            $where[0]=$time->format('Y-m-d');
            break;
        case "YESTERDAY":
            $time=new Carbon('YESTERDAY');
            $where[0]=$time->format('Y-m-d');
            break;
        case "THIS_WEEK":
            $start=new Carbon();
            $end=Carbon::now();
            $where[0]=$start->previousWeekday()->format('Y-m-d');
            $where[1]=$end->format('Y-m-d');
            break;

        case "THIS_MONTH":
            $start=new Carbon();
            $end=Carbon::now();
            $where[0]=$start->firstOfMonth()->format('Y-m-d');
            $where[1]=$end->format('Y-m-d');
            break;
        case "THIS_YEAR":
            $start=new Carbon();
            $end=Carbon::now();
            $where[0]=$start->firstOfYear()->format('Y-m-d');
            $where[1]=$end->format('Y-m-d');
            break;
        case "ALL_TIME":


            break;
        case "CUSTOM":

            $where[0]=$request->From;
            $where[1]=$request->To;
            break;

    }
    return $where;
}
    public function rows($where){
        if (count($where)==1){

            $ab=User::where('type','user')->whereHas('my_rates',function($query) use ($where){
                    $query->where('created_at',$where[0]);
                })->get()->sortByDesc(function ($q) use ($where){
                return $q->my_rates()->where('created_at',$where[0])->avg('rate');
            })->map(function ($query)use($where){
                return $query->setAttribute('rates', $query->my_rates()->where('created_at',$where[0])->avg('rate'));
            });

        }elseif(count($where)==2){
            $ab= User::where('type','user')->whereHas('my_rates',function($query) use ($where){
                        $query->whereBetween('created_at',[$where[0],$where[1]]);
                })->get()->sortByDesc(function ($q) use ($where){
                    return $q->my_rates()->whereBetween('created_at',[$where[0],$where[1]])->avg('rate');
            })->map(function ($query)use($where){
                return $query->setAttribute('rates', $query->my_rates()->whereBetween('created_at',[$where[0],$where[1]])->avg('rate'));
            });

        }else{
            $ab=User::where('type','user')->orderBy('rates')->get();

        }

        return $ab;
    }
    public function notification(){
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        $notifications=Notification::where('user_id',$user->id)->get();
        $data=new NotificationCollection($notifications);
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }


    public function terms(){
        $terms=Setting::where('id',23)->select(['id','slug','ar_value as value'])->first();
        return response()->json(compact('terms'),200);
    }
    public function policy(){
        $data=Setting::where('id',24)->select(['id','slug','ar_value as value'])->first();
        $status='ok';
        return response()->json(compact('data','status'),200);
    }


    public function about(){
        $data=Setting::where('id',22)->select(['id','slug',app()->getLocale().'_value as value'])->first();
        $status='ok';
        return response()->json(compact('data','status'),200);
    }
    public function contact_us(){
        $setting['address']=Setting::where('id',24)->select(['id','slug',app()->getLocale().'_value as value'])->first()->value;
        $setting['email']=Setting::where('id',21)->select(['id','slug','ar_value as value'])->first()->value;
        $setting['website']=Setting::where('id',25)->select(['id','slug','ar_value as value'])->first()->value;
        $status='ok';
        return response()->json(compact('setting','status'),200);
    }

    public function contact(StoreContact $request){
        $user=$this->user;
        $requests=$request->all();

        if (!is_null($user)){
            $requests['user_id']=$user->id;
        }
        $requests['type']='contact';
        $coun=Contact::create($requests);
        if (!$coun){

            return response()->json(['data'=>null,'message'=>'حدث خطأ أثناء عملية الارسال','status'=>'fails'],201);

        }
        return response()->json(['data'=>null,'message'=>'تم ارسال الرسالة بنجاح !','status'=>'ok'],200);

    }
    public function complaint(StoreContact $request){

        $user=$this->user;
        $requests=$request->all();
        if (!is_null($user)){
            $requests['user_id']=$user->id;
        }
        $requests['type']='complaint';
        $coun=Contact::create($requests);
        if (!$coun){

            return response()->json(['data'=>null,'message'=>'حدث خطأ أثناء عملية الارسال','status'=>'fails'],405);

        }
        return response()->json(['data'=>null,'message'=>'تم ارسال الرسالة بنجاح !','status'=>'ok'],201);

    }


}
