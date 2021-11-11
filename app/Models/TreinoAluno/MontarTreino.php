<?php

namespace App\Models\TreinoAluno;

use App\Models\Aluno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontarTreino extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }
}
