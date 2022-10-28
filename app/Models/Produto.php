<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    use HasFactory;

    protected $fillable = [
        'cod_barras',
        'nome',
        'descricao',
        'foto',
        'quantidade'
    ];

    protected $cast = [
        'nome' => 'string',
        'descricao' => 'string',
        'foto' => 'string',
        'quantidade' => 'integer'
    ];

    
}
