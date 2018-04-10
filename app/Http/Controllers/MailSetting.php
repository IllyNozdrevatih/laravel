<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSetting extends Controller
{
    public function send_form(Request $request){
        $this->validate($request ,[
            'massage' => 'required',
        ],[
            'massage.required' => 'введите сообщение',
        ]
            );
        $email = Auth::user()->email;
        $massage = $request->massage;

        Mail::to('noz2203@mail.ru')->send(new MailClass($massage,$email));
        return redirect(route('cabinet'));
    }
}
