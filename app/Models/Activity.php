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
    ];
    public $timestamps = false;
}
