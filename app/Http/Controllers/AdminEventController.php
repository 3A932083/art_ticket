<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function store(Request $request){

        Event::create($request->all());

        $acvivity=Activity::find($request->activity_id);
        $events=Event::where('activity_id','=',$request->activity_id)->orderby('time')->get();
        $data=[
          'activity'=>$acvivity,
            'events'=>$events,
        ];
        return view('admin.activities.show',$data);

    }
    public function destroy(Event $event){
        Event::destroy($event->id);
        $acvivity=Activity::find($event->activity_id);
        $events=Event::where('activity_id','=',$event->activity_id)->orderby('time')->get();
        $data=[
            'activity'=>$acvivity,
            'events'=>$events,
        ];

        return view('admin.activities.show',$data);
    }
}
