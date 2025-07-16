<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objetivo extends Model
{
    protected $fillable=[
        'nome',
        'destino'
    ];

    public function pago(): HasMany
    {
        return $this ->hasMany(Pago::class);
    }

    public function Receber(): HasMany
    {
        return $this ->hasMany(Receber::class);
    }
}

