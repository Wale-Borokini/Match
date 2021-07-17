<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    
    public function storeContactForm(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|digits:10|numeric',
        //     'subject' => 'required',
        //     'message' => 'required',
        // ]);

        // $input = $request->all();

        // Contact::create($input);


        //  Send mail to admin
        \Mail::send('contactMail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),            
            'subject' => $request->get('subject'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('waleborokini@gmail.com', 'Hello Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }

}
