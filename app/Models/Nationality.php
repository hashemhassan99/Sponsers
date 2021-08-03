<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sponsers()
    {
        return $this->hasMany(PersonalSponser::class);
    }
}
