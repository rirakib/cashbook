@extends('master')
@section('content')
<style>
    td{
        border:1px solid black;
        text-align: center;
    }
</style>
<h1 class="text-center mt-3 mb-3">Cashbook</h1>
<div class="row">
    <div class="col-md-10 mx-auto">
        <form action="{{route('cashbook.search')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
@php
$default_start_date = date("y-m-d");
$default_end_date = date("y-m-d");
$start_date = $start_date ?? $default_start_date;
$end_date = $end_date ?? $default_end_date;
$opening_balance = 0;

$total_deposite_ammount = DB::table('deposites')->sum('ammount');
$total_withdraw_ammount = DB::table('withdraw')->sum('ammount');
$total_bank_ammount = $total_deposite_ammount - $total_withdraw_ammount;

$income_data = DB::table('incomes')->join('income_categories','income_categories.id','=','incomes.income_category')
               ->select('incomes.date as income_date','incomes.ammount as income_ammount','income_categories.income_category as income_name')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();
$expense_data = DB::table('expense')->join('expense_categories','expense_categories.id','=','expense.expense_category')
                ->select('expense.date as expense_date','expense.ammount as expense_ammount','expense_categories.expense_category as expense_name')
                ->whereBetween('date',[$start_date , $end_date])
                ->get();

$collect_data = DB::table('collect')
               ->select('collect.date as collect_date','collect.ammount as collect_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();
$supply_data = DB::table('supplies')
               ->select('supplies.date as supply_date','supplies.ammount as supplies_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();


$withdraw_data = DB::table('withdraw')
               ->select('withdraw.date as withdraw_date','withdraw.ammount as withdraw_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();
$deposite_data = DB::table('deposites')
               ->select('deposites.date as deposite_date','deposites.ammount as deposite_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();


$sales_data    = DB::table('sales')
               ->select('sales.date as sale_date','sales.ammount as sale_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();
$purches_data  = DB::table('purches')
               ->select('purches.date as purches_date','purches.ammount as purches_ammount')
               ->whereBetween('date',[$start_date , $end_date])
               ->get();


$extra_income = $income_data->sum('income_ammount');
$withdraw = $withdraw_data->sum('withdraw_ammount');
$collect = $collect_data->sum('collect_ammount');
$sale = $sales_data->sum('sale_ammount');
$total_income = $extra_income + $withdraw + $collect + $sale;


$extra_expense = $expense_data->sum('expense_ammount');
$deposite = $deposite_data->sum('deposite_ammount');
$supply = $supply_data->sum('supply_ammount');
$purches = $purches_data->sum('purches_ammount');
$total_expense = $extra_expense + $deposite + $supply + $purches;
@endphp
    <p>Total Deposite Ammount {{$total_deposite_ammount}}</p>
    <p>Total Withdraw Ammount {{$total_withdraw_ammount}}</p>
    <p>Total Bank Ammount {{$total_bank_ammount}}</p>
    <p class="text-center">Start Date <strong>{{$start_date}} </strong>To  End Date <strong>{{$end_date}}</strong></p>

    <div class="row">
        <div class="col-md-10 d-flex justify-content-between">
            <div class="income">
                <h1>Income Details</h1>
                <p>Extra Income : {{$extra_income}}</p>
                <p> withdraw : {{$withdraw}}</p>
                <p>collect : {{$collect}}</p>
                <p>Sale : {{$sale}}</p>
                <p>Total Income : {{$total_income}} </p>
            </div>
            <div class="expense">
                <h1>Expense Details</h1>
                <p>Extra Expense : {{$extra_expense}}</p>
                <p> Deposite : {{$deposite}}</p>
                <p>supply : {{$supply}}</p>
                <p>purches : {{$purches}}</p>
                <p>Total Expense : {{$total_expense}} </p>
            </div>
        </div>
    </div>
    <h1 class="mt-3 mb-3 text-center bg-dark text-white pt-3 pb-3">
        Profit <span class="text-danger">{{$total_income - $total_expense}}</span>
    </h1>
@endsection