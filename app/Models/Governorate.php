<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sponsers()
    {
        return $this->hasMany(PersonalSponser::class);
    }

    public function goverments_sponsers()
    {
        return $this->hasMany(GovernmentSponser::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
