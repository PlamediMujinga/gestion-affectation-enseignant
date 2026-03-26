<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /** @use HasFactory<\Database\Factories\ProvinceFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'code'
    ];

    public function proveds()
    {
        return $this->hasMany(Proved::class);
    }

    public function ecoles()
    {
        return $this->hasMany(Ecole::class);
    }

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class);
    }
}
