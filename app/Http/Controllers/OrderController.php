<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index',[
            'orders'=>Order::all(),
        ]);
    }
    public function detail($id)
    {
        return view('admin.order.detail',['order'=>Order::find($id)]);
    }
}
