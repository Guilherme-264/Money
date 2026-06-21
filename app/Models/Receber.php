<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receber extends Model
{
    protected $fillable = ['user_id', 'valor', 'nome', 'descricao', 'data_recebido', 'objetivo_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
}