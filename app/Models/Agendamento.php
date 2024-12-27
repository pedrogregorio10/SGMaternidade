<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Escala;
class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'n_bi',
        'provincia',
        'municipio',
        'telefone',
        'estado',
        'status',
        'tipo',
        'id_medico',
        'id_escala',
        'motivo',
    ];

    public function medico()
    {
        return $this->belongsTo(User::class, 'id_medico'); // Assumindo que 'id_usuario' é a chave estrangeira
    }

    public function escala()
    {
        return $this->belongsTo(Escala::class, 'id_escala'); // Assumindo que 'id_escala' é a chave estrangeira
    }

}
