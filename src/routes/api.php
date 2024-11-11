<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacaoController;

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello, world!']);
});

Route::post('/formacao/salvar', [FormacaoController::class, 'store']);
