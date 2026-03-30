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
    ];

    public function proved()
    {
        return $this->hasMany(Proved::class);
    }

    public function ecole()
    {
        return $this->hasMany(Ecole::class);
    }

    public function enseignant()
    {
        return $this->hasMany(Enseignant::class);
    }
}
