<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function information(Activity $activity,Event $event)
    {
        $data = [
            'activity' => $activity,
            'event'=>$event
        ];
        return view('order.activity_information',$data);
    }

    public function check(Activity $activity,Event $event)
    {
        $data = [
            'activity' => $activity,
            'event'=>$event
        ];
        return view('order.activity_check',$data);
    }

    public function end(Activity $activity,Event $event)
    {
        $data = [
            'activity' => $activity,
            'event'=>$event
        ];
        return view('order.activity_end',$data);
    }
}


