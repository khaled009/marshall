<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $sender_email;
    public function __construct($user)
    {

        $this->sender_email=Setting::find(21)->ar_value;
        $this->user=$user;



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=[
            'email'=>$this->sender_email,
            'app_name'=>Setting::find(1)->ar_value
        ];

        return $this->view('admin.emails.reset',['user'=>$this->user,'data'=>$data])
            ->from($this->sender_email)
            ->subject('استرجاع كلمة المرور');
    }
}
