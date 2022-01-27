<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // sector relationship
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    // dish
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
