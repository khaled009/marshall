<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Setting;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $replyMessage;
    public $sender_email;

    public $subject;
    public function __construct($replyMessage,$sender_email=null)
    {
        $this->replyMessage=$replyMessage;
        if($sender_email==null){
            $sender_email=Setting::find(21)->ar_value;
        }
        $this->sender_email=$sender_email;

        $this->subject=Setting::find(1)->ar_value;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=[
            'replyMessage'=>$this->replyMessage,

        ];


        return $this->view('admin.emails.sendReply',['data'=>$data])
            ->from($this->sender_email)
            ->subject($this->subject);
    }
}
