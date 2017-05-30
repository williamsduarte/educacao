<?php

namespace App\Models\system\educational;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable =
    [
        'name',
        'name_abr',
        'knowleadge_id',
    ];

    public function Knowleadge()
    {
        return $this->belongsTo(Knowleadge::class);
    }

    public function Serie()
    {
        return $this->belongsToMany(Serie::class);
    }
}
