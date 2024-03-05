<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Inbox;
use App\User;
use Auth;
use DB;

class MailController extends Controller
{

    public function inbox()
    {
        $emails = Inbox::where('reciver_id' , auth::user()->id)->paginate(10);
        return view('common.mail.inbox', compact('emails'));
    }

    public function send()
    {
        $emails = Inbox::where('sender_id' , auth::user()->id)->paginate(10);
        return view('common.mail.send', compact('emails'));
    }

    public function read($id)
    {
        $email = Inbox::where('id', $id)->first();
        return view('common.mail.read', compact('email'));
    }

    public function compose()
    {
        $users = User::get();
        return view('common.mail.compose', compact('users'));
    }

    public function mail(Request $request)
    {
        // dd($request->all());
        $mail = new Inbox();
        $mail->sender_id = auth::user()->id;
        $mail->reciver_id = $request->reciver_id;
        $mail->subject = $request->subject;
        $mail->message = $request->message;
        $mail->save();
        return redirect('/inbox')->with('flash_message_success', 'Email send Successfully...');
    }

    public function delete($id)
    {
        Inbox::find($id)->delete();
        return redirect('/inbox')->with('flash_message_success', 'Email Delete Successfully...');
    }
}
