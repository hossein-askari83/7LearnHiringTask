<?php

namespace App\Listeners;

use App\Events\PostIndexFinished;
use App\Jobs\SendSMSJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSMS
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostIndexFinished $event): void
    {
        SendSMSJob::dispatch();
    }
}
