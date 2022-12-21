<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActicitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'id'=>'1',
            'name'=>'江歷之間',
            'start_time'=>'2022-12-12',
            'end_time'=>'2022-12-13',
            'place'=>'圓明園',
            'introduce'=>'歷史文物的博大精深，如滔滔江水綿延不絕，邀請大家一銅共襄盛舉',
            'organizer'=>'故宮博物院',
            'img'=>'故宮.jpg',
            'precaution'=>'請準時入場',
        ]);
    }
}
