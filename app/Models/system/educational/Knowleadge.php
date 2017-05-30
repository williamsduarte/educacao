<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Knowleadge extends Model
{
    public function Discipline()
    {
        return $this->hasOne(Discipline::class);
    }
}
