<?php

namespace Database\Seeders;
use App\Models\Event;
use Faker\Factory;
use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::truncate();   //重置資料表內容及編號
        Event::truncate();
        Activity::factory(20)->has(Event::factory(3))->create();
    }
}
