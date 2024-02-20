<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product, $cartProducts;

    public function index()
    {
        $this->cartProducts = Cart::content();
        return view('front-end.cart.index', [
            'cart_products' => $this->cartProducts
        ]);
    }

    public function addCart(Request $request)
    {
        $this->product = Product::find($request->id);
        Cart::add([
            'id'       => $request->id,
            'name'     => $this->product->name,
            'qty'      => $request->qty,
            'price'    => $this->product->selling_price,
            'options'  => [
                    'code'  => $this->product->code,
                    'image' => $this->product->image
            ]]);
        return redirect('/cart/show');
    }
    public function update(Request $request,$rowId)
    {
        Cart::update($rowId, $request->qty);
        return redirect('/cart/show')->with('message','Cart Product info update successfully');
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart/show')->with('message','Cart Product info delete successfully');
    }

}
