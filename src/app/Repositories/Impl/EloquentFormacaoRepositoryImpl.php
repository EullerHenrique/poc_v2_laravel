<?php

namespace App\Repositories\Impl;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Models\Formacao;
use App\Repositories\FormacaoRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentFormacaoRepositoryImpl implements FormacaoRepository
{
    public function listarFormacoes(): Collection
    {
        return Formacao::all();
    }

    public function listarFormacoesPaginadas(): LengthAwarePaginator
    {
        #Utiliza a paginacao do laravel
        $query = Formacao::query();
        return $query->paginate();
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
