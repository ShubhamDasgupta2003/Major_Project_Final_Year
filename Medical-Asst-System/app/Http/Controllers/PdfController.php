<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\support\Facades\DB;
use App\Models\medical_supplies_medical;
use App\Models\medical_supplies_technical;
use App\Models\medical_supplies_order;
use App\Models\cart;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Input;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PdfController extends Controller
{
    //
    public function generatePdf()
    {
        $carts = Cart::join('medical_supplies_medicals', 'carts.product_name', '=', 'medical_supplies_medicals.product_name')
        ->where('medical_supplies_medicals.quantity', '>', 0)
        ->where('carts.user_id', session()->get('user_id'))
        ->get();
        $data=[
           'tittle'=>'test pdf',
           'date'=>date('m/d/Y'),
           'carts'=>$carts,
           'username'=> session()->get('user_name'),
           'useremail' => session()->get('user_email')
        ];
      //  $pdf = Pdf::loadView('pdf.invoice', $data)->save(public_path(session()->get('user_name').'.pdf'));
        //return Pdf::loadFile(public_path().'\myfile.html')->save('\C:\xampp\htdocs\test\public\my_stored_file.pdf')->stream('download.pdf');

     /*   $mailData=[
            'title'=>'Mail from emergency medical assistance system',
            'body'=>'this is from testing email using smtp',

         ];
         $s=session()->get('user_email');

         Mail::to($s)->send(new DemoMail($mailData)); /*change this mail to send mail  
         dd('email send successfully');         */




        $data["email"] = session()->get('user_email');

        $data["title"] = "From Emergency Medical Assistance System";

        $data["body"] = "This is Demo";

  

        $pdf = Pdf::loadView('pdf.invoice', $data)->save(public_path(session()->get('user_name').session()->get('user_id').time().'.pdf'));

  

        Mail::send('pdf.invoice', $data, function($message)use($data, $pdf) {

            $message->to($data["email"])

                    ->subject($data["title"])

                    ->attachData($pdf->output(), "Receipt.pdf");

        });

  

      
         
         return $pdf->download(session()->get('user_name').'.pdf');


    }
}
