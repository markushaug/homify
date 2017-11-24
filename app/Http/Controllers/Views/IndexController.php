<?php

namespace App\Http\Controllers\Views;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        //return Module::all();
        return view('index');
    }

}
