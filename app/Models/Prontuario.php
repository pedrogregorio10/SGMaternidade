<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'prontuarios';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'id_consulta',
        'diagnostico',
        'tratamento',
        'exames_solicitados',
        'prescricao',
    ];

    // Relacionamento com a consulta
    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'id_consulta');
    }

}
