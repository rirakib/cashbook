<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IncomeController extends Controller
{
    //
    public function index()
    {
        return view('income.index');
    }
    public function category(Request $request)
    {
        DB::table('income_categories')->insert([
            'income_category' => $request->income_category
        ]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        DB::table('incomes')->insert([
            'income_category' => $request->income_category,
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
}
