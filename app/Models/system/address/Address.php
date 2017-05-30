<?php

namespace App\Models\system\address;

use App\Models\system\folks\LegalPerson;
use App\Models\system\folks\PhysicalPerson;
use App\Models\system\institutional\Prefecture;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'zipcode',
        'city',
        'state',
    ];

    public function PhysicalPerson()
    {
        return $this->hasOne(PhysicalPerson::class);
    }

    public function LegalPerson()
    {
        return $this->hasOne(LegalPerson::class);
    }

    public function Prefecture()
    {
        return $this->hasOne(Prefecture::class);
    }
}
