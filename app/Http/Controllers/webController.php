<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Cart;

class webController extends Controller {

    public function index() {
        $carts = Cart::content();
        $products = product::all();
        return view('Web.product_body', compact('products', 'carts'));
    }

}
