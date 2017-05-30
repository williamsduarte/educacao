<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    public function School()
    {
        return $this->hasMany(School::class);
    }
}
