<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function index(){
        return view('contact.contact');
    }
    public function sendEmail(Request $req){
        $data = [
            'name'=>$req->name,
            'email'=>$req->email,
            'message'=>$req->message
        ];

        Mail::to($data['email'])->send(new ContactMail($data));
        // return 'Thanks for reaching';
        // Mail::send('contact.email', $data, function ($info) {
        //     $info->from('dhakalsandesh0@gmail.com ', 'Sandesh Dhakal');

        //     $info->to($data->email)->subject('Your Reminder!');

        // });


    }
}
