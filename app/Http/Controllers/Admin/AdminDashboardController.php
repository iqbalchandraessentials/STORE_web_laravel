<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $Customer = User::count();
        $Revenue = Transaction::sum('total_price');
        $Transaction = Transaction::count();

        return view('pages.admin.index', [
            'customer' => $Customer,
            'revenue' => $Revenue,
            'transaction' => $Transaction,
        ]);
    }
}
