<?php

namespace App\Models\Treinos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoExercicios extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exercicio() {
        return $this->belongsTo(ExercicioTreinos::class, 'exercicio_id', 'id');
    }
}
