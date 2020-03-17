<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class MessageController extends Controller
{
    public function get_contact(){
        $model = Conversation::latest()->get();
        return view('admin.contact.index',compact('model'));
    }

    public function contact_show($id){

        $con=Conversation::find($id);
        if (is_null($con)){
            Flash::error('هذه الرسالة غير موجود');

            return back();
        }
        $messages=$con->messages;
        $user=$con->user;
        return view('admin.contact.show',compact('messages','user','con'));

    }
    public function sendmsg(Request $request){
        $message = Message::create([
            'conversation_id'=>$request->id,
            'message'=>$request->msg,
            'type'=>'admins',
            'user_id'=>auth()->id()
        ]);
        $fcm['title']='لديك رسالة جديدة من الادارة';
        $fcm['body']= $request->msg;
        $con=Conversation::find($request->id);
       foreach ($con->user->devices as $key){

           sendFCM($key->device_token,$fcm);
       }
        return response()->json(['msg'=>$request->msg],200);
    }
}
