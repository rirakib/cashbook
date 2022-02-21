<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //
    public function index()
    {
        return view('sale.index');
    }

    public function sale(Request $request)
    {
        DB::table('sales')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
    public function purches(Request $request)
    {
        DB::table('purches')->insert([
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
}
