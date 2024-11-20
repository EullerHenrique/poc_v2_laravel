<?php

namespace App\Services\Util\Paginate_Native;

use Illuminate\Http\Request;

class PaginateNativeUtilService
{
    public function __construct(){}

    public function obterCamposPaginacao(Request $request, int $qtdResults): array
    {
        $perPage = $request->get('perPage', 16);
        $lastPage = ceil($qtdResults / $perPage);
        $currentPage = min($lastPage, (int) $request->get('page', 1));
        $offset = max(1, ($currentPage - 1) * $perPage);

        return [
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'lastPage' => $lastPage,
            'offset' => $offset,
            'firstPageUrl' => $request->fullUrlWithQuery(['page' => 1]),
            'lastPageUrl' => $request->fullUrlWithQuery(['page' => $lastPage]),
            'previousPageUrl' => $request->fullUrlWithQuery(['page' => max(1, $currentPage - 1)]),
            'nextPageUrl' => $request->fullUrlWithQuery(['page' => min($lastPage, $currentPage + 1)]),
        ];
    }

    public function gerarLinksIntermediariosPaginacao(Request $request, int $currentPage, int $lastPage): array {
        [$start, $end] = $this->calcularIntervaloPaginacao($currentPage, $lastPage);
        $links = [];

        for ($page = $start; $page <= $end; $page++) {
            $links[] = $this->criarLink(
                $request->fullUrlWithQuery(['page' => $page]),
                $page,
                $page == $currentPage
            );
        }

        return $links;
    }

    public function gerarLinksPaginacao(Request $request, array $camposPaginacao): array
    {
        $links = [];
        if ($camposPaginacao['currentPage'] > 1) {
            $links[] = $this->criarLink($camposPaginacao['firstPageUrl'], 'Primeira Página', false);
            $links[] = $this->criarLink($camposPaginacao['previousPageUrl'], 'Anterior', false);
        }
        $links = array_merge(
            $links,
            $this->gerarLinksIntermediariosPaginacao($request, $camposPaginacao['currentPage'], $camposPaginacao['lastPage'])
        );
        if ($camposPaginacao['currentPage'] < $camposPaginacao['lastPage']) {
            $links[] = $this->criarLink($camposPaginacao['nextPageUrl'], 'Próximo', false);
            $links[] = $this->criarLink($camposPaginacao['lastPageUrl'], 'Última Página', false);
        }
        return $links;
    }

    public function calcularIntervaloPaginacao(int $currentPage, int $lastPage): array
    {
        if ($currentPage <= 6) {
            $start = max(1, $currentPage - 4);
            $end = min(10, $lastPage);
        }
        elseif ($currentPage > $lastPage - 10) {
            $start = max(1, $lastPage - 10);
            $end = $lastPage;
        } else {
            $start = $currentPage - 4;
            $end = $currentPage + 5;
        }

        return [$start, $end];
    }

    public function criarLink(string $url, string $label, bool $active): array
    {
        return [
            'url' => $url,
            'label' => $label,
            'active' => $active,
        ];
    }
}
