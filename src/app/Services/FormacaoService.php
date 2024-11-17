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
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateLaravel($request);
        foreach ($formacoesModel as $formacao) {
            $formacao->formattedDate = date('d/m/Y', strtotime($formacao->dateRemoved));
            unset($formacao->dateRemoved);
        }
        return $formacoesModel;
    }

    public function listarFormacoesPaginateNative(Request $request): array
    {
        $quantidadeFormacoes = $this->formacaoRepository->obterQuantidadeFormacoes();
        $formacoesModel = $this->formacaoRepository->listarFormacoesPaginateNative($request);
        foreach ($formacoesModel as $formacao) {
            $formacao->formattedDate = date('d/m/Y', strtotime($formacao->dateRemoved));
            unset($formacao->dateRemoved);
        }

        $currentPage = (int) $request->get('page', 1);
        $perPage = $request->get('perPage', 15);
        $lastPage = ceil($quantidadeFormacoes / $perPage);

        $firstPageUrl = $request->fullUrlWithQuery(['page' => 1]);
        $lastPageUrl = $request->fullUrlWithQuery(['page' => $lastPage]);

        $previousPageUrl = $request->fullUrlWithQuery(['page' => $currentPage <= 1 ? 1 : $currentPage - 1]);
        $nextPageUrl = $request->fullUrlWithQuery(['page' => $currentPage < $lastPage ? $currentPage + 1 : $lastPage]);

        $links = array();
        $links[] = [
            'url' => $firstPageUrl,
            'label' => 'Primeira Página',
            'active' => false
        ];
        $links[] = [
                'url' => $previousPageUrl,
                'label' => 'Anterior',
                'active' => false
        ];

        #Página atual estiver entre a primeira página e a sexta página
        if ($currentPage <= 6){
            $start = max(1, $currentPage - 4);
            $end = 10;
        }
        #Página atual estiver entre a última página e 10 paginas antes
        else if ($currentPage > $lastPage - 10){
            $start = $lastPage - 10;
            $end = $lastPage;
        }
        #Página atual estiver entre a sétima página e a dez páginas antes da última página
        else{
            $start = $currentPage - 4;
            $end = $currentPage + 5;
        }

        for ($page = $start; $page <= $end; $page++) {
            $links[] = [
                'url' => $request->fullUrlWithQuery(['page' => $page]),
                'label' => $page,
                'active' => $page == $currentPage
            ];
        }

        $links[] = [
            'url' => $nextPageUrl,
            'label' => 'Próximo',
            'active' => false
        ];
        $links[] = [
            'url' => $lastPageUrl,
            'label' => 'Última Página',
            'active' => false
        ];

        $listarFormacoesPaginateNativeResponse = new ListarFormacoesPaginateNativeResponse();
        $listarFormacoesPaginateNativeResponse->setData($formacoesModel);
        $listarFormacoesPaginateNativeResponse->setLinks($links);

        return $listarFormacoesPaginateNativeResponse->toArray();
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $this->formacaoRepository->salvarFormacoes($request);
    }
}
