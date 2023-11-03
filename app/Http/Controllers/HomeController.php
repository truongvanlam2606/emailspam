<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    const PAGINATE = 9;

    public function index(Request $request){

        return view('home');
    }


}
