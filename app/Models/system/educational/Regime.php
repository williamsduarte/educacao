<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    public function Course()
    {
        return $this->hasMany(Course::class);
    }
}
