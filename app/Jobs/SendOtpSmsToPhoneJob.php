<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class SendOtpSmsToPhoneJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $phone;
    public $otp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $phone, string $otp)
    {
        $this->phone = $phone;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Http::baseUrl("provider_url")
            ->withBasicAuth("USERNAME", "PASSWORD")
            ->post('send_sms_url', [
                "phone" => $this->phone,
                "test" => "Your activation code " . PHP_EOL . $this->otp
            ]);

//        $ACOUNR_SID = getenv("TWILIO_SID");
//        $AUTH_TOKEN = getenv("TWILIO_TOKEN");
//        $FROM = getenv('TWILIO_FROM');
//        $client = new Client($ACOUNR_SID, $AUTH_TOKEN);
//        $client->messages->create(
//        // Where to send a text message (your cell phone?)
//            "+998" . $this->data,
//            array(
//                'from' => $FROM,
//                'body' => 'Kodni kiriting! ' . $this->ops,
//            )
//        );
    }
}
