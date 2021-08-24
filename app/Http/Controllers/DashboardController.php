<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Product;
use App\TransactionDetail;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Str;
use App\ProductGallery;

class DashboardController extends Controller
{
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('user_id', Auth::user()->id);
            });

        $revenue = $transaction->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        $customer = User::count();

        return view('pages.dashboard', [
            'transaction_count' => $transaction->count(),
            'transaction_data' => $transaction->get(),
            'revenue' => $revenue,
            'customer' => $customer
        ]);
    }

    public function product()
    {
        $products = Product::with(['galleries', 'category'])->where('user_id', Auth::user()->id)->get();
        return view(
            'pages.dashboardProduct',
            ['products' => $products]
        );
    }

    public function detail(Request $request, $id)
    {
        $products = Product::with((['galleries', 'user', 'category']))->where('id', $id)->get();
        $categories = Category::all();
        return view(
            'pages.dashboardProductDetail',
            [
                'products' => $products,
                'categories' => $categories
            ]
        );
    }


    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);
        return redirect()->route('dashboard-product-detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-detail', $item->products_id);
    }



    public function add()
    {
        $categories = Category::all();
        return view('pages.dashboardAddProduct', [
            'categories' => $categories
        ]);
    }


    public function create(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = $request->user_id;
        $product = Product::create($data);

        $galllery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($galllery);

        return redirect()->route('dashboard-product');
    }



    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Product::FindorFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);
        return redirect()->route('dashboard-product');
    }

    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboardStore', [
            'users' => $user,
            'categories' => $categories
        ]);
    }

    public function updateAccount(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);
        return redirect()->route($redirect);
    }



    public function transaction()
    {
        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('user_id', Auth::user()->id);
            })
            ->get();

        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })
            ->get();

        return view(
            'pages.dashboardTransaction',
            [
                'sellTransactions' => $sellTransactions,
                'buyTransactions' => $buyTransactions
            ]
        );
    }



    public function transactionDetail()
    {
        return view('pages.dashboardTransactionDetail');
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboardAccount', [
            'users' => $user,
        ]);
    }
}
