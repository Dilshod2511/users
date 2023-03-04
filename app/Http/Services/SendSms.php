<?php


namespace App\Http\Services;

use App\Jobs\SendOtpSmsToPhoneJob;

class SendSms
{
    private $phone;
    private $otp;

    public function __construct(int $phone, string $otp)
    {
        $this->phone = $phone;
        $this->otp = $otp;
    }

    public function sendSmsPhone()
    {
        SendOtpSmsToPhoneJob::dispatch($this->phone, $this->otp);
    }


}
