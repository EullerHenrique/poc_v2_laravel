<?php

namespace App\Repositories\Impl;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Models\Formacao;
use App\Repositories\FormacaoRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentFormacaoRepositoryImpl implements FormacaoRepository
{
    public function listarFormacoes(): Collection
    {
        return Formacao::all();
    }

    public function listarFormacoesPaginadasQueryLaravel(Request $request): LengthAwarePaginator
    {
        $perPage = $request->get('perPage', 15);
        $query = Formacao::query();
        $result = $query->paginate($perPage);
        return $result->appends(['perPage' => $perPage]);
    }

    public function listarFormacoesPaginadasQueryNative(Request $request): array
    {
        #Ex: 10
        $page = $request->get('page', 1);
        #Ex 20
        $perPage = $request->get('perPage', 15);
        #Ex: (15 - 1) * 10 = 140
        $offset = ($page - 1) * $perPage;

        #Ex: Busca os registros de 140 a 160
        return DB::select(
            "SELECT * FROM formacao ORDER BY dateRemoved DESC LIMIT :perPage OFFSET :offset", [
            'perPage' => $perPage,
            'offset' => $offset,
        ]);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $formacoesModel = collect($request->formacao)->map(function ($formacao) {
            return new Formacao([
                'link' => $formacao['link'],
                'title' => $formacao['title'],
                'categoryName' => $formacao['categoryName'],
                'kindDisplayName' => $formacao['kindDisplayName'],
                'icon' => $formacao['icon'],
                'dateRemoved' => Carbon::createFromFormat('d/m/Y', $formacao['formattedDate']),
            ]);
        })->toArray();

        Formacao::insert($formacoesModel);
    }
}
