<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacaoController;

Route::get('/formacao/listar', [FormacaoController::class, 'show']);
Route::post('/formacao/salvar', [FormacaoController::class, 'bulkStore']);
