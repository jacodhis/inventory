<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneratePdf extends Controller
{
    //
    public function htmlPdf(){
        
    //    $load =  view()->share('customers.receipt',);
       
    //    dd($load);
        $pdf = PDF::loadView('pdf.receipts');
        dd($pdf);
        // dd($pdf);
        return $pdf->download('customer.receipt');
    }
}
