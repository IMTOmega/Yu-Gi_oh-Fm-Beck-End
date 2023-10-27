<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;
    protected $table = 'cartas';

    protected $fillable = [
        'numero',
        'nome',
        'tipo',
        'raca',
        'lvl',
        'atk',
        'def',
        'password',
        'custo',
        'imagem'
    ];
}
