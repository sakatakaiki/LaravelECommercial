<?php

namespace App\Services;

class TwilioService
{
    public function sendOtp($phoneNumber)
    {
        $otp = rand(100000, 999999);

        // Lưu OTP vào session để xác minh sau
        session(['otp' => $otp, 'otp_phone' => $phoneNumber]);

        // Ghi log để dev xem (hoặc echo để debug)
        logger("Fake OTP sent to {$phoneNumber}: {$otp}");

        return $otp; // return fake SID nếu cần
    }

    public function verifyOtp($phoneNumber, $otp)
    {
        $sessionOtp = session('otp');
        $sessionPhone = session('otp_phone');

        if ($otp == $sessionOtp && $phoneNumber == $sessionPhone) {
            return 'approved'; // giả lập thành công
        }

        return 'failed';
    }
}
