<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    //
    public function index()
    {
        return view('loan.index');
    }

    public function supplay(Request $request)
    {
        DB::table('supplies')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
    public function collect(Request $request)
    {
        DB::table('collect')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
}
