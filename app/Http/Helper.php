<?php

namespace App\Http;

use App\Models\Acceptor;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
// use Modules\CRUDController;
use App\Http\Modules\CRUDController;
use Morilog\Jalali\Jalalian;
use stdClass;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class Helper
{
    public static function sendSMS($phone_number, $pattern)
    {

        $apiKey = env('SMS_PANEL');
        $pid = $pattern;
        $fnum = env('SMS_PANEL_NUMBER');
        //Send SMS to $phone_number
    }
}
