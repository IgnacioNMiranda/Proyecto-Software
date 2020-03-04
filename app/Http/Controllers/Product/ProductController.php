<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }

}
