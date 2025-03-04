<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desenvolvedor;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveis';

    protected $fillable = [
        'nivel',
    ];

    public function Desenvolvedores(){
        return $this->hasMany(Desenvolvedor::class, 'nivel_id');
    }
}
