<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function show()  //類別編號1
    {
        $activities=Activity::where('category','=',1)->orderBy('id','DESC')->get();
        $data=[
            'activities'=>$activities,
        ];
        return view('home.show',$data);
    }

    public function diy()   //類別編號2
    {
        $activities=Activity::where('category','=',2)->orderBy('id','DESC')->get();
        $data=[
            'activities'=>$activities,
        ];
        return view('home.diy',$data);
    }

    public function lecture()   //類別編號3
    {
        $activities=Activity::where('category','=',3)->orderBy('id','DESC')->get();
        $data=[
            'activities'=>$activities,
        ];
        return view('home.lecture',$data);
    }

    public function activity(Activity $activity)
    {

        $events=Event::where('activity_id','=',$activity->id)->orderby('time')->get();
        $data=[
            'activity'=>$activity,
            'events'=>$events,

        ];
        return view('activity.activity', $data);
    }

}

