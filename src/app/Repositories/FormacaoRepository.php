<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface FormacaoRepository
{

    public function listarFormacoes(): Collection;

    public function listarFormacoesPaginadasQueryLaravel(Request $request): LengthAwarePaginator;

    public function listarFormacoesPaginadasQueryNative(Request $request);

    public function salvarFormacoes(SalvarFormacoesRequest $request): void;
}
