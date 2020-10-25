<?php

namespace sicaab\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use sicaab\Mail\MessageReceived;
use App\Mail\MakeEmail; 

class MessagesController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email'=> 'required',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);
        $emails = explode(",", request()->email);
        foreach ($emails as $email) {
            var_dump(trim($email," "));
            Mail::to(trim($email," "))->queue( new MessageReceived($data));

            
        }
        return "Mensaje Enviado";
    }
}
