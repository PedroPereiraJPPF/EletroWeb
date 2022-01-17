<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternativa extends Model
{
    protected $fillable = ['descrição', 'correta', 'questao_id'];
    use HasFactory;
    public function alternativa()
    {
        return $this->hasMany('App\alternativa', 'questao_id');
    }
}
