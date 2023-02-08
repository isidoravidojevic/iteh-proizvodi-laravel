<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proizvodjac;
use App\Models\MernaJedinica;

class Proizvod extends Model
{
    use HasFactory;

    public function proizvodjac()
    {
        return $this->belongsTo(Proizvodjac::class);
    }

    public function merna_jedinica()
    {
        return $this->belongsTo(MernaJedinica::class);
    }
}
