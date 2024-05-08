<?php

namespace App\Http\Controllers;

use App\Models\Patient_ambulance;
use App\Models\Payments_records;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay_amount(Request $request)
    {
        // return $request;
        $ptn_detail = Patient_ambulance::where('invoice_no',$request->order_id)->get();
        $amount = $request->amount;
        return view("/Payment/razor_pay",compact('ptn_detail','amount'));

    }
    public function process_payment(Request $request)
    {

            $payment_entry_model = new Payments_records();
            $count = Payments_records::count();
            $payment_entry_model->payment_id = $count+1;
            $payment_entry_model->order_id = $request->order_id;
            $payment_entry_model->user_id = $request->user_id;
            $payment_entry_model->amount = $request->amount;
            $payment_entry_model->service_type = "Ambulance Service";
            $payment_entry_model->payment_status = "Initiated";
            $payment_entry_model->payment_date = date('Y-m-d');
            $payment_entry_model->payment_time = date('H:i:s');
            $payment_entry_model->save();
            return redirect()->route('make-payment-page',['order_id'=>$request->order_id,'amount'=>$request->amount]);
    }
    public function makePayment(Request $request)
    {
        if($request->ajax())
        {
            $payment_id_update = Payments_records::where('order_id',$request->order_id)->update(['payment_id'=>$request->pid,'payment_status'=>'complete']);
            if($payment_id_update)
            {
                return response()->json(['data'=>"Payment Successfull"]);
            }
            
        }
        return view("Payment.payment_process");
    }
    public function paymentSuccess(Request $request)
    {
        return view('Payment.payment_ackn');
    }
}
