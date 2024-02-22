<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private static $order;
    public function index()
    {
        return view('front-end.checkout.index');
    }
    public function newOrder(Request $request)
    {
        self::$order = Order::newOrder($request);
        OrderDetail::newOrderDetail(self::$order);

        return redirect('/');
    }
}
