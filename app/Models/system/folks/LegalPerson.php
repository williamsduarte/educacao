<?php

namespace App\Models\system\folks;

use App\Models\system\address\Address;
use App\Models\system\educational\School;
use Illuminate\Database\Eloquent\Model;

class LegalPerson extends Model
{
    protected $fillable =
    [
        'company_name',
        'fantasy_name',
        'cnpj',
        'phone',
        'cell_phone',
        'address_id',
        'district',
        'public_place',
        'email',
        'site',
        'state_registration'
    ];

    public function Address()
    {
        return $this->belongsTo(Address::class);
    }

    public function School()
    {
        return $this->hasMany(School::class);
    }
}
