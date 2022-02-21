<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    //
    public function index()
    {
        return view('bank.index');
    }

    public function deposite(Request $request)
    {
        DB::table('deposites')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
    public function withdraw(Request $request)
    {
        DB::table('withdraw')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
}
