<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function information(Activity $activity)
    {
        $data = [
            'activity' => $activity,
        ];
        return view('order.activity_information',$data);
    }

    public function check(Activity $activity)
    {
        $data = [
            'activity' => $activity,
        ];
        return view('order.activity_check',$data);
    }

    public function end(Activity $activity)
    {
        $data = [
            'activity' => $activity,
        ];
        return view('order.activity_end',$data);
    }
}


