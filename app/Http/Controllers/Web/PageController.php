<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\InvestigationGroup;
use App\Product;

class PageController extends Controller
{
    public function investigation_groups(){
        $invGroups = InvestigationGroup::orderBy('id','DESC')->paginate(12);

        return view('welcome',compact('invGroups'));
    }

    public function products(){
        $products = Product::orderBy('id','name','DESC')->paginate(12);
        return view('welcome',compact('products'));
    }
    


}
