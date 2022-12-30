<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
            'status'=>0,
        ]);
        return view('user.index');
    }

    public function test()
    {
        $array=array();
        $orders=Order::where('id','<','13')->get();
        foreach ($orders as $order){
            $event=Event::where('id','=',$order->event_id)->get();
           // $user=User::where('id','=',$order->user_id)->get();
            echo $event;
            //$activity=$event->activity()->get();
       //$activity=Activity::where('id','=',$event->activity_id)->get();
        }

       // $array=Arr::add($array,"key",["order"=>111,"event"=>23,"activity"=>123]);

       // print_r($event->id) ;
        //return view('order.activity_end');
    }
}


