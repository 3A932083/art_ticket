<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function information()
    {
        return view('order.activity_information');
    }

    public function check()
    {
        return view('order.activity_check');
    }
    public function end()
    {
        return view('order.activity_end');
    }
}
