<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'activity_id',
        'time',
        'count',
        'price',
    ];
    public $timestamps = false;//不用儲存建立時間及修改時間
}
