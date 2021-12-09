<?php

namespace App\Models\Avaliacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Aluno;

class AnamneseAvaliacaoFisica extends Model
{
    use HasFactory;

    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }
}
