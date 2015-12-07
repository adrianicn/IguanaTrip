<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class InviteFriendsMail extends Job implements SelfHandling

{
    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => trans('front/verify.email-title'),
            'intro'  => trans('front/verify.email-intro'),
            'link'   => trans('front/verify.email-link'),
            
        ];
        
        $mailer->send('emails.auth.inviteFriend', $data, function($message) {
            $message->to("adrian.dcn@hotmail.com", "Adrian")
                    ->subject(trans('front/verify.email-title'));
        });
    }
    
}
