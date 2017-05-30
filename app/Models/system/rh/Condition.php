<?php

namespace App\Models\system\rh;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function Employee()
    {
        return $this->hasOne(Employee::class);
    }
}
