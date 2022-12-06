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
        'start_name',
        'end_name',
        'place',
        'introduce',
        'organizer',
        'img',
    ];
}
