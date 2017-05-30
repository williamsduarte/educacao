<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable =
    [
        'school_id',
        'year',
        'start',
        'end',
        'status',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
