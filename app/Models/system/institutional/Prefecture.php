<?php

namespace App\Models\system\institutional;

use App\Models\system\address\Address;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable =
    [
        'name',
        'manager',
        'phone',
        'address_id',
        'district',
        'public_place'
    ];

    public function Address()
    {
        return $this->belongsTo(Address::class);
    }

    public function Secretary()
    {
        return $this->hasMany(Secretary::class);
    }
}
