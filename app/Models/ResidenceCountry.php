<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceCountry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sponsers()
    {
        return $this->hasMany(Sponser::class);
    }
}
