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

    public function listarFormacoesPaginateLaravel(Request $request): LengthAwarePaginator
    {
        $perPage = $request->get('perPage', 16);
        $query = Formacao::query();
        $result = $query->paginate($perPage);
        return $result->appends(['perPage' => $perPage]);
    }

    public function obterQuantidadeFormacoes(): int
    {
        return Formacao::count();
    }

    public function listarFormacoesPaginateNative(int $perPage, int $offset): array
    {
        #Ex: $currentPage = 10
        #Ex: $perPage = 20
        #Ex: $offset = (15 - 1) * 10 = 140 -> Busca os registros de 140 a 160

        return DB::select(
            "SELECT * FROM formacao ORDER BY dateRemoved DESC LIMIT :perPage OFFSET :offset", [
            'perPage' => $perPage,
            'offset' => $offset
        ]);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): void
    {
        $formacoesModel = collect($request->formacao)->map(function ($formacao) {
            return new Formacao([
                'link' => $formacao['link'],
                'title' => $formacao['title'],
                'categoryName' => $formacao['categoryName'],
                'icon' => $formacao['icon'],
                'dateRemoved' => Carbon::createFromFormat('d/m/Y', $formacao['formattedDate']),
            ]);
        })->toArray();

        Formacao::insert($formacoesModel);
    }
}
