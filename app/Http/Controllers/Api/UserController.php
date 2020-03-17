<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Http\Requests\Api\user\MessageStore;
use App\Http\Requests\Api\user\ReuploadVideo;
use App\Http\Requests\Api\user\SaveVideo;
use App\Http\Requests\Api\user\SearchRequest;
use App\Http\Requests\Api\user\UpdateProfile;
use App\Http\Resources\MessageResource;
use App\Http\Resources\SearchCollection;
use App\Http\Resources\user\RateResource;
use App\Http\Resources\user\VideoResource;
use App\Http\Resources\UserResource;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Platform;
use App\Models\Video;
use App\User;
use Carbon\Carbon;

class UserController extends MasterApiController
{
    /* Developed By Ahmed Feisal*/

    public function upload_video(SaveVideo $request){
        $platform=Platform::find($request->platform_id);
        if ($this->user->videos->count()+1 >$platform->attempts){
            return response()->json(['data'=>null,'message'=>'لقد تجاوزت الحد المسموح لك بعدد المحاولات','status'=>'fails'],403);

        }
        $requests=$request->all();
        if ($request->hasFile('video')) {

            $requests['video'] = saveImage($request->video, with(new Video())->getTable());
        }
        $video = $this->user->videos()->create($requests);

       /* $videos = new Video;
        $videos->user_id = 1;
        $videos->platform_id = $request->platform_id;
        $videos->video = $requests['video'];
        $videos->save();*/

        return response()->json(['data'=>null,'message'=>'تم رفع الفيديو بنجاح','status'=>'ok'],200);
    }

    public function reupload_video(ReuploadVideo $request){
        $video=Video::find($request->video_id);
        $end_date=Carbon::parse($video->created_at)->addMonths(3)->format('Y-m-d');

        if (now()->format('Y-m-d')<$end_date){
            return response()->json(['data'=>null,'message'=>'لا يوجد رفع الفيديو الا بعد المدة المحددة للرفع','status'=>'fails'],403);

        }
        $video->video=saveImage($request->video, with(new Video())->getTable());
        $video->update();
        return response()->json(['data'=>new VideoResource($video),'message'=>'تم رفع الفيديو بنجاح','status'=>'ok'],200);
    }

    public function get_profile(){
        $data= new UserResource($this->user);
        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }

    public function update_profile(UpdateProfile $request){
        $user=$this->user;
        $requests=$request->except('image');
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }

        $user->update($requests);

        $data= new UserResource($user);
        return response()->json(['data'=>$data,'message'=>'تم التعديل بنجاح','status'=>'ok'],200);
    }

    public function my_videos(){
        $data= VideoResource::collection($this->user->videos);
        return response()->json(['data'=>$data,'message'=>'','status'=>'ok'],200);

    }

    public function my_rates(){
        $this->data['data']['my_rate']=$this->user->rates;
        $this->data['data']['rates_count']=$this->user->my_rates()->count();
        $this->data['data']['rates']=RateResource::collection($this->user->my_rates);
        $this->data['status']='ok';
        return response()->json($this->data,200);

    }

    public function search(SearchRequest $request){
        $players=User::where('type','user')->where('name', 'like', '%' . $request->search . '%')->get();
        $platforms=Platform::where('title', 'like', '%' . $request->search . '%')->get();
        $result=$players->merge($platforms);
        $this->data['data']=new SearchCollection($result);
        $this->data['status']='ok';
        return response()->json($this->data,200);

    }

    public function chat_store(){
        $conversation=Conversation::firstOrCreate(['user_id'=>$this->user->id]);
        $this->data['data']['conversation_id']=$conversation->id;
        $this->data['data']['messages']=MessageResource::collection($conversation->messages);
        $this->data['status']='ok';
        return response()->json($this->data,200);
    }

    public function message_store(MessageStore $request){
        $data['user_id']=$this->user->id;
        $data['message']=$request->message;
        $data['conversation_id']=$request->conversation_id;
        $data['type']='users';
        $message=Message::create($data);

//        broadcast(new \App\Events\ExampleEvent($message));

        $this->data['data']=new MessageResource($message);
        $this->data['status']='ok';
        return response()->json($this->data,200);
    }

}
