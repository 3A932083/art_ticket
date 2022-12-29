<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function check(Activity $activity,Event $event)
    {

        $data = [
            'activity' => $activity,
            'events'=>$event,
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

    public function store(Request $request)
    {
        $id=Auth::id();
        Order::create([
        'event_id'=>$request->event,
        'user_id'=>$id,
        ]);
    }
}


