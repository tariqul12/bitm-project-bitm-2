<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopgridController extends Controller
{
    private $products;
    public function index()
    {
        $this->products = Product::where('status', 1)->orderBy('id', 'desc')->take(8)->get();
        return view('front-end.home.home', [
            'products' => $this->products
        ]);
    }

    public function category($id)
    {
        return view('front-end.category.index', [
            'products'=> Product::where('category_id', $id)->get(),
            'categories' => Category::all()
        ]);
    }

    public function product($id)
    {
        return view('front-end.product.index', [
            'product' => Product::find($id)
        ]);
    }
}
