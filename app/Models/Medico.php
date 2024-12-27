<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'id_user',
        'especialidade',
        'ordem',
    ];

    /**
     * Relacionamento com o modelo User.
     */
        /**
     * Relação: Um médico pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'id_user', 'id');
   }
}
