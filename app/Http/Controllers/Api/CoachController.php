<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Http\Requests\Api\Coach\ConversationStore;
use App\Http\Requests\Api\Coach\PlayerInformation;
use App\Http\Requests\Api\Coach\RatePlayer;
use App\Http\Requests\Api\Coach\UpdateProfile;
use App\Http\Requests\Api\Coach\UserFavovite;
use App\Http\Requests\Api\user\MessageStore;
use App\Http\Resources\ChatCollection;
use App\Http\Resources\coach\PlayerResource;
use App\Http\Resources\CoachResource;
use App\Http\Resources\MessageResource;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\UserRate;
use App\Models\UserFavorite as PlayerFav;
use App\User;

class CoachController extends MasterApiController
{

    public function player(PlayerInformation $request){
        $player = User::find($request->player_id);
        if ($player->type!='user'){
            return response()->json(['message'=>'غير مسموح لك','status'=>'fails'], 401);
        }

        $data= new PlayerResource($player);
        return response()->json(['data'=>$data,'status'=>'ok'], 200);

    }

    public function rate(RatePlayer $request){
        $player = User::find($request->player_id);
        if ($player->type!='user'){
            return response()->json(['message'=>'غير مسموح لك','status'=>'fails'], 401);
        }

        $rate=UserRate::where(['user_id'=>$player->id,'rater_id'=>$this->user->id])->first();
        if (is_null($rate)){
            $rate=new UserRate();
            $rate->user_id=$player->id;
            $rate->rater_id=$this->user->id;
            $rate->rate=$request->rate;
            $rate->comment=$request->comment;
            $rate->save();
        }else{
            $rate->rate = $request->rate;
            $rate->comment = $request->comment;
            $rate->update();
        }
        $rates=UserRate::where(
            'user_id' , $player->id
        )->avg('rate');

        $player->rates=(int)$rates;
        $player->update();
        return response()->json(['message'=>'تم ارسال تقييمك بنجاح','status'=>'ok'], 200);

    }

    public function update(UpdateProfile $request){
        $user =$this->user;
        if ($request->name){
            $user->name=$request->name;
        }
        if ($request->mobile){
            $user->mobile=$request->mobile;
        }
        if ($request->email){
            $user->email=$request->email;
        }
        if ($request->latitude){
            $user->latitude=$request->latitude;
        }
        if ($request->longitude){
            $user->longitude=$request->longitude;
        }
        if ($request->hasFile('image')) {

            $requests['image'] = saveImage($request->image, with(new User)->getTable());
        }
        $user->update();
        $data= new CoachResource($user);

        return response()->json(['data'=>$data,'status'=>'ok'],200);
    }
    public function user_favorite(UserFavovite $request)
    {
        $player = User::find($request->player_id);
        if ($player->type!='user'){
            return response()->json(['message'=>'غير مسموح لك','status'=>'fails'], 401);
        }
        $is_like=PlayerFav::where('favoriter_id',$this->user->id)->where('user_id',$player->id)->first();
        if (is_null($is_like)){
            $this->_DoFav($player->id);
            $message='تم اضافة اللاعب الي المفضلة بنجاح';
        }else{
            $this->_doUnFav($player->id);
            $message='تم ازالة اللاعب من المفضلة بنجاح';
        }
//        $this->data['data'] = new FavoriteProductResource($product);
        $this->data['status'] = "ok";
        $this->data['message'] = $message;
        return response()->json($this->data, 200);

    }

    public function my_favorites(){
        $user=$this->user;
        $players=$user->players_favorites;
        $this->data['data']= \App\Http\Resources\PlayerResource::collection($players);
        $this->data['status'] = 'ok';
        return response()->json($this->data, 200);
    }

    public function conversation_store(ConversationStore $request){
        $data['user_id']=$this->user->id;
        $data['player_id']=$request->player_id;
        $conversation=Conversation::firstOrCreate($data);
        $this->data['data']['conversation_id']=$conversation->id;
        $this->data['data']['player']=[
            'id'=>$conversation->player_id,
            'name'=>$conversation->player->name,
            'image'=>asset($conversation->player->image),
            'rates'=>$conversation->player->rates,
        ];
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

    public function chat(){
        $user = $this->user;
        $chats = $user->chats()->latest()->get()->groupBy('player_id')->flatten();

        $this->data['data']=new ChatCollection($chats);
        $this->data['status']='ok';
        return response()->json($this->data,200);

    }
    /*
     * ============== Asset Functions ============
     */
    public function _DoFav($id)
    {
        $fav=new PlayerFav();
        $fav->favoriter_id=$this->user->id;
        $fav->user_id=$id;
        $fav->save();
        return true;
    }
    public function _doUnFav($id)
    {
        $fav=PlayerFav::where('favoriter_id',$this->user->id)->where('user_id',$id)->first();
        $fav->delete();
        return true;
    }
}
