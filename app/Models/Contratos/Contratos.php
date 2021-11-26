<?php

namespace App\Models\Contratos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Aluno;

class Contratos extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function professor() {
        return $this->belongsTo(DadosProfessorContrato::class, 'professor_id', 'id');
    }
    
    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }

    public function infoContrato() {
        return $this->belongsTo(InfoAdicionalContrato::class, 'codigo_treino', 'codigo_treino');
    }
}
