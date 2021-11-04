<?php

namespace App\Models\Treinos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExercicioTreinos extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoriaTreino() {
        return $this->belongsTo(CategoriaTreinos::class, 'categoria_treino_id', 'id');
    }
}
