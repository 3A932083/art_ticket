<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function information(Activity $activity)
    {
        $events=Event::where('activity_id','=',$activity->id)->orderby('time')->get();
        $data = [
            'activity' => $activity,
            'events'=>$events,
        ];
        return view('order.activity_information',$data);
    }

    public function check(Activity $activity)
    {
        $events=Event::where('activity_id','=',$activity->id)->orderby('time')->get();
        $data = [
            'activity' => $activity,
            'events'=>$events,
        ];
        return view('order.activity_check',$data);
    }

    public function end(Activity $activity)
    {
        $events = Event::where('activity_id','=',$activity->id)->orderby('time')->get();
        $data = [
            'activity' => $activity,
            'events'=>$events,
        ];
        return view('order.activity_end',$data);
    }
}


