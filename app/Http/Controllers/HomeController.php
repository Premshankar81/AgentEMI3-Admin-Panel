<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentLinks;
use App\Models\PaymentItems;

class HomeController extends Controller
{
    public function index($id)
    {
    	$invoice  = PaymentLinks::where('tokenid',$id)->first();
        $invoicedetails  = PaymentItems::where('payment_link_id',$invoice->id)->get();
        return view('dashboard',compact('invoice','invoicedetails'));
    }
}
