<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request){
        // if ($request->type) {
            //     if ($request->message) {
        //         $msg = 'I am ' . $request->type . ', ' . $request->message;
        //     } else {
        //         $msg = 'I am ' . $request->type;
        //     }
        //     $data['message'] = $msg;
        // } else {
        //     $data['message'] = $request->message;
        // }
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'nullable'
        ]);
        // dd($data);
        if (Enquiry::create($data)) {
            $email=[env('MAIL_TO')];
            Mail::send('front.emails.enquiry-mail', ['enquiry' => $data], function ($message) use ($email, $request) {
                $message->to($email)
                    ->replyTo(env('MAIL_TO'))
                    ->subject($request->name . ' | New Enquiry');
            });
            //send email to client
            $email = $request->email;
            Mail::send('front.emails.thankyou-layout', ['enquiry' => $data], function ($message) use ($email, $request) {
                $message->to($email)
                    ->replyTo(env('MAIL_TO'))
                    ->subject('Narayam Charitable Trust | Thank you');
            });
        }
        return response('Your feedback was sent successfully!');
    }
}
