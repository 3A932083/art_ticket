<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_time=$this->faker->date('y-m-d');
        do{
            $end_time=$this->faker->date('y-m-d');
        }while($start_time>$end_time);


        return [
            'name'=>$this->faker->sentence,//活動名稱
            'start_time'=>$this->faker->date('y-m-d'),//開始時間
            'end_time'=>$this->faker->date('y-m-d'),//結束時間
            'place'=>$this->faker->city(),//活動地點
            'introduce'=>$this->faker->paragraph,//活動介紹
            'organizer'=>$this->faker->company,//主辦單位
            'img'=>rand(0,3).'.jpg',//活動圖片
            'precaution'=>$this->faker->paragraph,//注意事項
        ];
    }
}
