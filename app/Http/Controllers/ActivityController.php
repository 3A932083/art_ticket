<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
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

    public function activity(Activity $activity,Event $event)
    {
        $data = [
            'activity' => $activity,
            'event'=>$event
        ];
        return view('activity.activity', $data);
    }

}

