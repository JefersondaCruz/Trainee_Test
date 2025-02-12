<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    use HasFactory;

    protected $table = 'desenvolvedores';
    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento',
        'hobby',
        'nivel_id',
    ];

    public function Nivel(){
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }
}

