<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Database\Eloquent\Collection;

interface FormacaoRepository
{

    public function listarFormacoes(): Collection;

    public function salvarFormacoes(SalvarFormacoesRequest $request): void;
}
