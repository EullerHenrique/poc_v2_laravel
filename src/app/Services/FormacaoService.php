<?php

namespace App\Services;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Repositories\FormacaoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

readonly class FormacaoService
{
    public function __construct(private FormacaoRepository $formacaoRepository){}

    public function listarFormacoes(): Collection
    {
        return $this->formacaoRepository->listarFormacoes();
    }

    public function listarFormacoesPaginadasQueryLaravel(Request $request): LengthAwarePaginator
    {
        return $this->formacaoRepository->listarFormacoesPaginadasQueryLaravel($request);
    }

    public function listarFormacoesPaginadasQueryNative(Request $request): array
    {
        return $this->formacaoRepository->listarFormacoesPaginadasQueryNative($request);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
