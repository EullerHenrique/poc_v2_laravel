<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface FormacaoRepository
{

    public function listarFormacoes(): Collection;

    public function listarFormacoesPaginadas(): LengthAwarePaginator;

    public function salvarFormacoes(SalvarFormacoesRequest $request): void;
}
