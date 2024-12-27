<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Escala;

class Consulta extends Model
{

    use HasFactory;

    protected $table='consultas';

    protected $fillable = [
    'id_paciente',
    'id_medico',
    'id_escala',
    'tipo',
    'status',
    'motivo',
    'observacoes',
    ];

    /**
     * Get the user that owns the Consulta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_medico', 'id');
    }

    /**
     * Get the user that owns the Consulta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id');
    }

    public function escala()
    {
        return $this->belongsTo(Escala::class, 'id_escala');
    }
}
