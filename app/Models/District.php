<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // sector relationship
    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }
}
