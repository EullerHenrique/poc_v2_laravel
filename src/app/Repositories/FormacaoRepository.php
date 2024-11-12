<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacoesRequest;

interface FormacaoRepository
{

    public function listarFormacoes();

    public function salvarFormacoes(SalvarFormacoesRequest $request): void;
}
