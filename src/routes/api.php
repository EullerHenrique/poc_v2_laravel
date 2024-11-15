<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacaoController;

Route::controller(FormacaoController::class)->group(function () {
    Route::get('formacao/listar', 'listarFormacoes');
    Route::get('formacao/listar/paginate', 'listarFormacoesPaginadas');
    Route::post('formacao/salvar', 'salvarFormacoes');
});
