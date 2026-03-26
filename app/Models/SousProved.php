<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousProved extends Model
{
    /** @use HasFactory<\Database\Factories\SousProvedFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'code',
        'proved_id',
        'adresse',
        'telephone',
        'email'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function proveds()
    {
        return $this->belongsTo(Proved::class);
    }

    public function ecoles()
    {
        return $this->hasMany(Ecoles::class);
    }

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class);
    }

}
