<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

class Escala extends Model
{

    use HasFactory;

    protected $table = 'Escalas';
    protected $fillable = [
        'data',
        'id_medico',
        'quantidade',
    ];

    /**
     * Relacionamento com o modelo User (médico).
     */
    public function medico()
    {
        return $this->belongsTo(User::class, 'id_medico');
    }


}
