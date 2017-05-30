<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =
    [
        'course',
        'initials',
        'stage',
        'workload',
        'objective',
        'target',
        'level_id',
        'type_id',
        'regime_id'
    ];

    public function Level()
    {
        return $this->belongsTo(Level::class);
    }

    public function Type()
    {
        return $this->belongsTo(Type::class);
    }

    public function Regime()
    {
        return $this->belongsTo(Regime::class);
    }
}
