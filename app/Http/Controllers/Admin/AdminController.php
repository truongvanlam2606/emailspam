<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    const PAGINATE = 9;

    public function index(Request $request){

        return view('admin.index');
    }


}
