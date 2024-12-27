<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    
protected $fillable = [
    'nome',
    'data_nascimento',
    'n_bi',
    'provincia',
    'municipio',
    'telefone',
    'estado',
];
}
