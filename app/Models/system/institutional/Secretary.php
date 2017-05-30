<?php

namespace App\Models\system\institutional;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $fillable =
    [
        'prefecture_id',
        'name',
        'manager',
        'district',
        'public_place',
        'phone'
    ];

    public function Prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function Sector()
    {
        return $this->hasMany(Sector::class);
    }
}
