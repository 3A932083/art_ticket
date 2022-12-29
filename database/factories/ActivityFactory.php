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
            'name'=>$this->faker->sentence(2),//活動名稱
            'start_time'=>$start_time,//開始時間
            'end_time'=>$end_time,//結束時間
            'place'=>$this->faker->city(),//活動地點
            'introduce'=>$this->faker->text('200'),//活動介紹
            'organizer'=>$this->faker->company,//主辦單位
            'img'=>rand(1,9).'.jpg',//活動圖片
            'precaution'=>$this->faker->text('200'),//注意事項
            'is_feature'=>rand(0,1),//是否推薦
            'category'=>rand(1,3),//活動類別
        ];
    }
}
