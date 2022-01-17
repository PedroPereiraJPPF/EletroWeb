<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questõe extends Model
{
    protected $fillable = ['descrição', 'materia'];
    use HasFactory;
    public function questõe()
    {
        return $this->belongsTo('App\questõe', 'questao_id');
    }
}
