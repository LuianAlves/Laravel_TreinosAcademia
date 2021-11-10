<?php

namespace App\Models\Treinos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'professor_id', 'id');
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }
}
