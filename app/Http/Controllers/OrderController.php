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
        $user=Auth::user();
        $array=array();
        $count=0;
        Order::create([
        'event_id'=>$request->event,
        'user_id'=>$user->id,
            'status'=>0,
        ]);
        $orders=Order::where('user_id','=',$user->id)->orderby('id','DESC')->get();
        foreach ($orders as $order){
            $events=$order->event()->get();
            foreach ($events as $event){
                $activities=$event->activity()->get();
                foreach ($activities as $activity){
                    $array=Arr::add($array,$count,[
                        'order_id'=>$order->id,
                        'event_id'=>$event->id,
                        'event_time'=>$event->time,
                        'event_price'=>$event->price,
                        'activity_id'=>$activity->id,
                        'activity_name'=>$activity->name,
                    ]);
                    $count++;
                }
            }
        }
        $data=[
            'user'=>$user,
            'array'=>$array,
        ];
        return view('user.index',$data);
    }

    public function test()
    {
        $array=array();
        $count=0;
        $orders=Order::where('id','<','4')->get();
        foreach ($orders as $order){
            $events=$order->event()->get();
            foreach ($events as $event){
                $activities=$event->activity()->get();
                foreach ($activities as $activity){
                    $array=Arr::add($array,$count,[
                        'order_id'=>$order->id,
                        'event_id'=>$event->id,
                        'activity_id'=>$activity->id,
                    ]);
                    $count++;
                }
            }
        }
        print_r($array);
    }


}


