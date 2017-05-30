<?php

namespace App\Models\system\institutional;

use App\Models\system\rh\Employee;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable =
    [
        'secretary_id',
        'sector',
        'branch'
    ];

    public function Secretary()
    {
        return $this->belongsTo(Secretary::class);
    }

    public function Employee()
    {
        return $this->hasOne(Employee::class);
    }
}
