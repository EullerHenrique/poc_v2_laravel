<?php

namespace App\Services\Dto;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Http\Responses\Paginate_Native\PaginateNativeResponse;
use App\Repositories\FormacaoRepository;
use App\Services\Util\Formacao\FormacaoUtilService;
use App\Services\Util\Paginate_Native\PaginateNativeUtilService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class FormacaoDtoService
{
    public function __construct(private FormacaoRepository        $formacaoRepository,
                                private FormacaoUtilService       $formacaoUtilService,
                                private PaginateNativeUtilService $paginateNativeUtilService){}

    public function listarFormacoes(): Collection
    {
        return $this->formacaoRepository->listarFormacoes();
    }

    public function listarFormacoesPaginateLaravel(Request $request): LengthAwarePaginator
    {
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateLaravel($request);
        foreach ($formacoesModel as $formacao) {
            $formacao->formattedDate = date('d/m/Y', strtotime($formacao->dateRemoved));
            unset($formacao->dateRemoved);
        }
        return $formacoesModel;
    }

    public function listarFormacoesPaginateNative(Request $request): array
    {
        $qtdResults = $this->formacaoRepository->obterQuantidadeFormacoes();
        $camposPaginacao = $this->paginateNativeUtilService->obterCamposPaginacao($request, $qtdResults);
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateNative($camposPaginacao['perPage'], $camposPaginacao['offset']);
        $formacoesDto = $this->formacaoUtilService->formatarDatasFormacoes($formacoesModel);
        $linksDto = $this->paginateNativeUtilService->gerarLinksPaginacao($request, $camposPaginacao);
        $response = new PaginateNativeResponse($formacoesDto, $linksDto);
        return $response->toArray();
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
