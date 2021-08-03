<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSponser extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function residenceCountry()
    {
        return $this->belongsTo(ResidenceCountry::class);
    }
}
