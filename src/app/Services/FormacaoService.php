<?php

namespace App\Services;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Repositories\FormacaoRepository;
use Illuminate\Database\Eloquent\Collection;

readonly class FormacaoService
{
    public function __construct(private FormacaoRepository $formacaoRepository){}

    public function listarFormacoes(): Collection
    {
        return $this->formacaoRepository->listarFormacoes();
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
