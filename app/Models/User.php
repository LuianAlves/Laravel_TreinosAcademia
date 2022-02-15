<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Pagamentos\Pagamento;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function pagamentosChart() {
        $mes = Carbon::now()->format('m');

        $pago = Pagamento::select('mes_pagamento_geral', 'valor_pagamento_geral')
                         ->orderBy('created_at', 'ASC')
                         ->where('status', 1)
                         ->where('mes_pagamento_geral', $mes)
                         ->get()
                         ->toArray();

        $dataPago = array_map(function($item) {
            return ['x' => $item['mes_pagamento_geral'], 'y' => $item['valor_pagamento_geral']];
        }, $pago);

        return $dataPago;
    }
    
    public static function pagamentosPendenteChart() {

        $mes = Carbon::now()->format('m');

        $pendente = Pagamento::select('mes_pagamento_geral', 'valor_pagamento_geral')
                         ->orderBy('created_at', 'ASC')
                         ->where('status', 0)
                         ->where('mes_pagamento_geral', $mes)
                         ->get()
                         ->toArray();

        $dataPendente = array_map(function($item) {
            return ['x' => $item['mes_pagamento_geral'], 'y' => $item['valor_pagamento_geral']];
        }, $pendente);

        return $dataPendente;
    }
    
}
