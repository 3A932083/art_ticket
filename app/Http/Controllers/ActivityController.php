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

    public function activity()
    {
        return view('activity.activity');
    }

    public function activity_information()
    {
        return view('activity.activity_information');
    }

    public function activity_check()
    {
        return view('activity.activity_check');
    }
    public function activity_end()
    {
        return view('activity.activity_end');
    }
}

