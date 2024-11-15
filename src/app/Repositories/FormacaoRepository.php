<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface FormacaoRepository
{

    public function listarFormacoes(): Collection;

    public function listarFormacoesPaginadas(Request $request): LengthAwarePaginator;

    public function salvarFormacoes(SalvarFormacoesRequest $request): void;
}
