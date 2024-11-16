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

        $currentPage = (int) $request->get('page', 1);
        $perPage = $request->get('perPage', 15);
        $lastPage = ceil($quantidadeFormacoes / $perPage);
        $from = ($currentPage - 1) * $perPage + 1;
        $to = $from + $perPage;

        $pathUrl = $request->url();

        $firstPageUrl = $request->fullUrlWithQuery(['page' => 1]);
        $lastPageUrl = $request->fullUrlWithQuery(['page' => $lastPage]);

        $nextPageUrl = $request->fullUrlWithQuery(['page' => $currentPage + 1]);
        $previousPageUrl = $request->fullUrlWithQuery(['page' => $currentPage - 1]);

        $links = array();
        if ($currentPage > 1) {
            $links[] = [
                'url' => $previousPageUrl,
                'label' => '&laquo; Previous',
                'active' => false
            ];
        }
        for ($page = max(1, $currentPage - 4); $page < $currentPage; $page++) {
            $links[] = [
                'url' => $request->fullUrlWithQuery(['page' => $page]),
                'label' => $page,
                'active' => $page == $currentPage
            ];
        }
        for ($page = $currentPage; $page <= min($currentPage + 5, $lastPage); $page++) {
            $links[] = [
                'url' => $request->fullUrlWithQuery(['page' => $page]),
                'label' => $page,
                'active' => $page == $currentPage
            ];
        }
        if($currentPage < $lastPage) {
            $links[] = [
                'url' => $nextPageUrl,
                'label' => 'Next &raquo;',
                'active' => false
            ];
        }
        $listarFormacoesPaginateNativeResponse = new ListarFormacoesPaginateNativeResponse();
        $listarFormacoesPaginateNativeResponse->setCurrentPage($currentPage);
        $listarFormacoesPaginateNativeResponse->setData($formacoesModel);
        $listarFormacoesPaginateNativeResponse->setFirstPageUrl($firstPageUrl);
        $listarFormacoesPaginateNativeResponse->setFrom($from);
        $listarFormacoesPaginateNativeResponse->setLastPageUrl($lastPageUrl);
        $listarFormacoesPaginateNativeResponse->setLastPage($lastPage);
        $listarFormacoesPaginateNativeResponse->setLinks($links);
        $listarFormacoesPaginateNativeResponse->setNextPageUrl($nextPageUrl);
        $listarFormacoesPaginateNativeResponse->setPath($pathUrl);
        $listarFormacoesPaginateNativeResponse->setPerPage($perPage);
        $listarFormacoesPaginateNativeResponse->setPrevPageUrl($previousPageUrl);
        $listarFormacoesPaginateNativeResponse->setTo($to);
        $listarFormacoesPaginateNativeResponse->setTotal($quantidadeFormacoes);

        return $listarFormacoesPaginateNativeResponse->toArray();
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
