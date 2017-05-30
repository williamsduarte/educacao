<?php

namespace App\Models\system\folks;

use Illuminate\Database\Eloquent\Model;

class Civil extends Model
{
    public function PhysicalPerson()
    {
        return $this->hasOne(PhysicalPerson::class);
    }
}
