<?php

namespace App\Services;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Repositories\FormacaoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class FormacaoService
{
    public function __construct(private FormacaoRepository $formacaoRepository){}

    public function listarFormacoes(): Collection
    {
        return $this->formacaoRepository->listarFormacoes();
    }

    public function listarFormacoesPaginadas(): LengthAwarePaginator
    {
        return $this->formacaoRepository->listarFormacoesPaginadas();
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
