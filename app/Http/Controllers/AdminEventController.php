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
        $events=Event::where('activity_id','=',$request->activity_id)->get();
        $data=[
          'activity'=>$acvivity,
            'events'=>$events,
        ];
        return view('admin.activities.show',$data);

    }
}
