<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductsTransactionController extends Controller
{
    public function index()
    {
        return view('pages.dashboard-transaction');
    }
    public function details()
    {
        return view('pages.dashboard-transaction-details');
    }
}
