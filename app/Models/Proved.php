<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proved extends Model
{
    /** @use HasFactory<\Database\Factories\ProvedFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'code',
        'province_id',
        'adresse',
        'telephone',
        'email'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

    public function sousProveds()
    {
        return $this->hasMany(SousProved::class);
    }
}
