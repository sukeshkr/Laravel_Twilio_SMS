<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'phone'    => 'required',
            'message' => 'required',
        ]);

        $receiverNumber  = $request->phone;
        $message  = $request->message;

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

                return redirect()->back()->with('message','The message was sent successfully');

        } catch (Exception $e) {
            return redirect()->back()->with('message',"The message failed with status: " . $e->getMessage());

        }

    }
}
