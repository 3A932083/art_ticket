<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
