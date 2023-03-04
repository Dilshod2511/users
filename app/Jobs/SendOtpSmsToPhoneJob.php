<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendOtpSmsToPhoneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $ops;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $ops)
    {
        $this->data = $data;
        $this->ops = $ops;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $ACOUNR_SID = getenv("TWILIO_SID");
        $AUTH_TOKEN = getenv("TWILIO_TOKEN");
        $FROM = getenv('TWILIO_FROM');
        $client = new Client($ACOUNR_SID, $AUTH_TOKEN);
        $client->messages->create(
        // Where to send a text message (your cell phone?)
            "+998" . $this->data,
            array(
                'from' => $FROM,
                'body' => 'Kodni kiriting! ' . $this->ops,
            )
        );


    }
}
