<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'start_time',
        'end_time',
        'place',
        'introduce',
        'organizer',
        'img',
        'precaution',
    ];
    public $timestamps = false;//不用儲存建立時間及修改時間
    public function events(){
        //一個活動有多個場次
        return $this->hasMany(Activity::class);
    }
}
