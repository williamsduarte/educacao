<?php

namespace App\Models\system\rh;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function Employee()
    {
        return $this->hasOne(Employee::class);
    }
}
