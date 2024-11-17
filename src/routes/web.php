<?php

use App\Http\Controllers\FormacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/formacao', [FormacaoController::class, 'exibirPaginaFormacao']);
