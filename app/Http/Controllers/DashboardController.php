<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function product()
    {
        return view('pages.dashboardProduct');
    }

    public function detail()
    {
        return view('pages.dashboardProductDetail');
    }
    public function add()
    {
        return view('pages.dashboardAddProduct');
    }
    public function transaction()
    {
        return view('pages.dashboardTransaction');
    }
    public function transactionDetail()
    {
        return view('pages.dashboardTransactionDetail');
    }
    public function account()
    {
        return view('pages.dashboardAccount');
    }
    public function store()
    {
        return view('pages.dashboardStore');
    }
}
