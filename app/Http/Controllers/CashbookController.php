<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashbookController extends Controller
{
    //
    public function index()
    {
        return view('cashbook');
    }
    public function search(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('cashbook',compact('start_date','end_date'));
    }
}
