<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $arr = ['HTML', 'CSS', 'JS', 'PHP', 'MYSQL', 'LARAVEL'];
        return view('welcome', ['framework' => 'Laravel', 'languages' => $arr]);
    }

    public function contact()
    {
        return view('contact');
    }
}
