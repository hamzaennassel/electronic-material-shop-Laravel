<?php

namespace App\Http\Controllers;
// use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;




class MailController extends Controller
{
    
    // public function index (){
    //     $mailData=[
    //         'title'=>'Mail from hamza',
    //         'body' => 'this is for testing email ',
    //     ];
    //     Mail::to('hamzaennassel@gmail.com')->send(new Test($mailData));

    //     dd('email send successfully');
    // }

    public function  send(Request $request){
            // $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'subject' => 'required',
            //     'message' => 'required',

            // ]);

            if($this->isOnline()){
                 $mail_data =[
                    'recipient' => 'hamzaennassel@gmail.com',
                    'fromEmail' =>$request->email,
                    'fromName' =>$request->name,
                    'subject' =>$request->subject,
                    'body' =>$request->message,
                ];
                //  \Mail::send('email-template',$mail_data,function ($message) use ($mail_data){
                //     $message->to($mail_data['recipient'])
                //             ->from($mail_data['fromEmail'],$mail_data['fromName'])
                //             ->subject($mail_data['subject']);
                //  });

                Mail::to($mail_data['recipient'])->send(new TestMail($mail_data));
                 return redirect()->back()->with('success','Email send!');
            }
            else{
                return redirect()->back()->withinput()->with('error','check your internet connection');
            }


    }

    public function isOnline($site='http://youtube.com/'){
        if(@fopen($site,'r')){
            return true;
        }
        else{
            return false;
            
        }
    }
}
