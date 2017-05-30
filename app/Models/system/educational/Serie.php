<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function Discipline()
    {
        return $this->belongsToMany(Discipline::class);
    }
}
