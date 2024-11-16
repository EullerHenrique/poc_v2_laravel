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
        $quantidadeFormacoes = $this->formacaoRepository->obterQuantidadeFormacoes();
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateNative($request);

        $page = $request->get('page', 1);
        $perPage = $request->get('perPage', 15);
        $lastPage = ceil($quantidadeFormacoes / $perPage);
        $from = ($page - 1) * $perPage + 1;
        $to = $from + $perPage;

        $pathUrl = $request->url();

        $firstPageUrl = $request->fullUrlWithQuery(['page' => 1]);
        $lastPageUrl = $request->fullUrlWithQuery(['page' => $lastPage]);

        $nextPageUrl = $request->fullUrlWithQuery(['page' => $page + 1]);
        $previousPageUrl = $request->fullUrlWithQuery(['page' => $page - 1]);

        $links = array();
        $links[] = [
            'url' => $nextPageUrl,
            'label' => '&laquo; Previous',
            'active' => false
        ];
        $links[] = [
            'url' => $previousPageUrl,
            'label' => 'Next &raquo;',
            'active' => false
        ];

        return ListarFormacoesPaginateNativeResponse::new()->toArray(
            $page,
            $formacoesModel,
            $firstPageUrl,
            $from,
            $lastPageUrl,
            $lastPage,
            $links,
            $nextPageUrl,
            $pathUrl,
            $perPage,
            $previousPageUrl,
            $to,
            $quantidadeFormacoes
        );
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
