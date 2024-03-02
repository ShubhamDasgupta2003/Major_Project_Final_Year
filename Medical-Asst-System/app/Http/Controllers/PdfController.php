<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //
    public function generatePdf()
    {
        $data=[
           'tittle'=>'test pdf',
           'date'=>date('m/d/Y'),
           
        ];
        $pdf = Pdf::loadView('pdf.invoice', $data);
        //return Pdf::loadFile(public_path().'\myfile.html')->save('\C:\xampp\htdocs\test\public\my_stored_file.pdf')->stream('download.pdf');
         return $pdf->download('invoice.pdf');
    }
}
