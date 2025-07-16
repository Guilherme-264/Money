<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    protected $fillable=
    [
        'valor',
        'nome',
        'descricao',
        'data_recebido',
        'objetivo_Id'
    ];

    public function objetivo():BelongsTo
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_Id');
    }
}
