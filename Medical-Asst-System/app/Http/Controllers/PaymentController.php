<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay_amount()
    {
        return view("/Payment/razor_pay");
    }
}
