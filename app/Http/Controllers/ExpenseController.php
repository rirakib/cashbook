<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    //
    public function index()
    {
        return view('expense.index');
    }
    public function category(Request $request)
    {
        DB::table('expense_categories')->insert([
            'expense_category' => $request->expense_category
        ]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        DB::table('expense')->insert([
            'expense_category' => $request->expense_category,
            'ammount' => $request->ammount,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
}
