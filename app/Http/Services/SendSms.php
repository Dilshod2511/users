<?php


namespace App\Http\Services;

use App\Jobs\SendPhoneNomer;

class SendSms
{
    private $phone;
    private $otp;
    public  function __construct($phone,$otp)
    {
        $this->phone=$phone;
        $this->otp=$otp;
    }

    public  function sendSmsPhone()
    {
        SendPhoneNomer::dispatch($this->phone,$this->otp);
    }


}
