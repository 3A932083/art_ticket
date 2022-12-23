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
        return [
            'name'=>$this->faker->sentence,//活動名稱
            'start_time'=>$this->faker->date('yyyy-mm-dd'),//開始時間
            'end_time'=>$this->faker->date('yyyy-mm-dd'),//結束時間
            'place'=>$this->faker->city(),//活動地點
            'introduce'=>$this->faker->paragraph,//活動介紹
            'organizer'=>$this->faker->company,//主辦單位
            'img'=>$this->faker->image(public_path('images')),//活動圖片
            'precaution'=>$this->faker->paragraph,//注意事項
        ];
    }
}
