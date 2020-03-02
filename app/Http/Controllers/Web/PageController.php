<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\InvestigationGroup;

class PageController extends Controller
{
    public function investigation_groups(){
        $invGroups = InvestigationGroup::orderBy('id','DESC')->paginate(12);

        return view('welcome',compact('invGroups'));
    }
}
