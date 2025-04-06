<?php

namespace App\Services;
use Twilio\Rest\Client;
class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(
            config('services.twilio.account_sid'),
            config('services.twilio.auth_token')
        );
    }

    public function sendOtp($phoneNumber)
    {
        return $this->twilio->verify
            ->v2
            ->services(config('services.twilio.verify_sid'))
            ->verifications
            ->create($phoneNumber, 'sms');
    }

    public function checkOtp($phoneNumber, $code)
    {
        return $this->twilio->verify
            ->v2
            ->services(config('services.twilio.verify_sid'))
            ->verificationChecks
            ->create([
                'to' => $phoneNumber,
                'code' => $code
            ]);
    }
}
