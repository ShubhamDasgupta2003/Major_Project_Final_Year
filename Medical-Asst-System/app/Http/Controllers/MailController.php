<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Input;

class MailController extends Controller
{
    public function index()
    {
         $mailData=[
            'title'=>'Mail from emergency medical assistance',
            'body'=>'this is from testing email using smtp',

         ];

         Mail::to('royaatraya5@gmail.com')->send(new DemoMail($mailData)); /*change this mail to send mail  */
         dd('email send successfully');
         
    }
    public function send_attach_email()
    {
      /*   $mailData=[
            'title'=>'Mail from emergency medical assistance',
            'body'=>'this is from testing email using smtp',

         ];

         Mail::to('royaatraya5@gmail.com')->send(new DemoMail($mailData));
         dd('email send successfully');
        */
        $data=array('name'=>'gazi adib');
        Mail::send(['text'=>'mail'],$data,function($message)
        {
          $message->to('royaatraya5@gmail.com','user')->subject('laravel email with attachment');
           // $message->to('shubhamdasgupta2003@gmail.com','user')->subject('laravel email with attachment');
            $message->attach('C:\xampp\htdocs\test\public\uploads\th.jpg');
            $message->from('emergencymedicalservices23@gmail.com','user');
        });
         
    }
}
