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
        'proveds_id',
        'adresse',
        'telephone',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proved()
    {
        return $this->belongsTo(Proved::class);
    }

    public function ecole()
    {
        return $this->hasMany(Ecoles::class);
    }

    public function enseignant()
    {
        return $this->hasMany(Enseignant::class);
    }

}
