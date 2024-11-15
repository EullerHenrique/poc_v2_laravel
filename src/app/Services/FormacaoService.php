<?php

namespace App\Services;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Http\Responses\ListarFormacoesPaginateNativeResponse;
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

    public function listarFormacoesPaginateLaravel(Request $request): LengthAwarePaginator
    {
        return $this->formacaoRepository->listarFormacoesPaginateLaravel($request);
    }

    public function listarFormacoesPaginateNative(Request $request): array
    {
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateNative($request);
        $page = $request->get('page', 1);
        return ListarFormacoesPaginateNativeResponse::new()->toArray($page, $formacoesModel);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
