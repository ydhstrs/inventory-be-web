<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(ExpensesChart $chart)
    {
        return view('guest.home', ['chart' => $chart->build()]);   
    }
}
