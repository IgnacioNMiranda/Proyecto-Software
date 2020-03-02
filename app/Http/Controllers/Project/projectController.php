<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers;


class projectController extends Controller
{
    public function project(){
        return view('project.posts');
    }
}
