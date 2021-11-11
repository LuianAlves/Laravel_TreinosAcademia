<?php

namespace App\Models\TreinoAluno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Treinos\ExercicioTreinos;

class AdicionarExercicio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exercicio() {
        return $this->belongsTo(ExercicioTreinos::class, 'exercicio_id', 'id');
    }
}
