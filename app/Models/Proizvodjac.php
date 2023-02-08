<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proizvod;

class Proizvodjac extends Model
{
    use HasFactory;

    public function proizvodi()
    {
        return $this->hasMany(Proizvod::class);
    }
}
