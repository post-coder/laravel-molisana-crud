<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $pasta = config('pasta');
        
        
        return view('home', compact('pasta'));
    }
}
