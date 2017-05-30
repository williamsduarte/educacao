<?php

namespace App\Models\system\folks;

use App\Models\system\address\Address;
use App\Models\system\rh\Employee;
use Illuminate\Database\Eloquent\Model;

class PhysicalPerson extends Model
{
    protected $fillable =
    [
        'name',
        'cpf',
        'rg',
        'dispatcher',
        'birth',
        'genre_id',
        'civil_id',
        'phone',
        'cell_phone',
        'father',
        'mother',
        'address_id',
        'district',
        'public_place'
    ];

    public function Address()
    {
        return $this->belongsTo(Address::class);
    }

    public function Civil()
    {
        return $this->belongsTo(Civil::class);
    }

    public function Genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function Employee()
    {
        return $this->hasOne(Employee::class);
    }
}
