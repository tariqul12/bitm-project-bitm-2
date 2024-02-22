<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('front-end.checkout.index');
    }
    public function newOrder(Request $request)
    {
        Order::newOrder($request);
        return redirect('/');
    }
}
