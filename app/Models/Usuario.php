<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['Nome', 'Email', 'password', 'Ano', 'TipoUser', 'acertosEletricidade', 'errosEletricidade', 'acertosEletronica', 'errosEletronica'];
    protected $attributes =
    [
        'Nome' => "null",
        'Email' => "null",
        'password' => "null",
        'Ano' => "null",
        'TipoUser' => 'aluno',
        'acertosEletricidade' => 0,
        'errosEletricidade' => 0,
        'acertosEletronica' => 0,
        'errosEletronica' => 0

    ];
    use HasFactory;
}
