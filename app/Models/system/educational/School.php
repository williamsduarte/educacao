<?php

namespace App\Models\system\educational;

use App\Models\system\folks\LegalPerson;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable =
    [
        'legal_person_id',
        'network_id',
        'localization_id'
    ];

    public function LegalPerson()
    {
        return $this->belongsTo(LegalPerson::class);
    }

    public function Network()
    {
        return $this->belongsTo(Network::class);
    }

    public function Localization()
    {
        return $this->belongsTo(Localization::class);
    }

    public function Lesson()
    {
        return $this->hasOne(Lesson::class);
    }
}
