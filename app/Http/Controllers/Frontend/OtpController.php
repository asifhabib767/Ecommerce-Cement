<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function send(Request $request)
    {
        return response()->json($request->phone_no);
        // dd($request->phone_no);
        $otp = Otp::where('phone_no', $request->phone_no)->get();
        // Check if the account is exist for this phone no
        $checked = true;



        if ($checked) {
            // Send an otp via sms
            

            // Update in users table password for this user as this otp
        }
    }
}
