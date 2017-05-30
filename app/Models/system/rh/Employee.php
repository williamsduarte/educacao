<?php

namespace App\Models\system\rh;

use App\Models\system\folks\PhysicalPerson;
use App\Models\system\institutional\Sector;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =
    [
        'physical_person_id',
        'sector_id',
        'link_id',
        'condition_id',
    ];

    public function PhysicalPerson()
    {
        return $this->belongsTo(PhysicalPerson::class);
    }

    public function Sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function Link ()
    {
        return $this->belongsTo(Link::class);
    }

    public function Condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function User()
    {
        return $this->hasOne(User::class);
    }
}
