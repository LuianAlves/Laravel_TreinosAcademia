<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Pagamentos\Pagamento;

class IndexController extends Controller
{
    public function index(Request $request) {
        $pagamentos_pendentes = Pagamento::where('status', 0)->orderBy('data_pagamento_geral', 'ASC')->limit(4)->get();

        return view('app.index', compact('pagamentos_pendentes'));
    }
}
