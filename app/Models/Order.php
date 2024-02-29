<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    private static $order;
    public static  function newOrder($request)
    {
        self::$order = new Order();
        self::$order->name = $request->name;
        self::$order->email = $request->email;
        self::$order->mobile = $request->mobile;
        self::$order->delivery_address = $request->delivery_address;
        self::$order->sub_total = $request->sub_total;
        self::$order->tax_total = $request->tax_total;
        self::$order->shipping_total = $request->shipping_total;
        self::$order->order_total = $request->order_total;
        self::$order->order_timestamp = strtotime(date("F-j-Y, g:i a"));
        self::$order->payment_method = $request->payment_method;
        self::$order->save();
        return self::$order;

    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
