<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    /**
     * homePage
     *
     * HomePage of Application
     * 
     * @return void
     */
    public function homePage()
    {
        $products = Product::orderBy('id','desc')->get();
        // return view ('pages.product.index')->with('products','products');
        return view ('frontend.pages.index', compact('products'));

    }
}
