<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function show()
    {
        return view('home.show');
    }

    public function diy()
    {
        return view('home.diy');
    }
    public function lecture()
    {
    return view('home.lecture');
    }
}

