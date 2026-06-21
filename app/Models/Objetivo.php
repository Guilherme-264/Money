<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['user_id', 'nome', 'destino'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'objetivo_id');
    }

    public function recebers()
    {
        return $this->hasMany(Receber::class, 'objetivo_id');
    }
}