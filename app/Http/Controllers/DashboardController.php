<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\ProductStocks;
use App\Models\ReturnProduct;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_products = Product::count();
        $total_users = User::count();
        $total_stocks_in = ProductStocks::where('status','in')->count();
        $total_return_products = ReturnProduct::count();
        $recent_products = Product::with(['category','brand'])->latest()->limit(10)->get();

        return view('home', compact('total_products','total_users','total_stocks_in','total_return_products','recent_products'));
    }
}
