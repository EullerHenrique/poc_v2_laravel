<?php

namespace App\Repositories\Impl;

use App\Http\Requests\SalvarFormacaoRequest;
use App\Http\Requests\SalvarFormacoesRequest;
use App\Models\Formacao;
use App\Repositories\FormacaoRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentFormacaoRepositoryImpl implements FormacaoRepository
{
    public function all(): Collection
    {
        return Formacao::all();
    }

    public function add(SalvarFormacaoRequest $request): Formacao
    {
        $formacao = new Formacao();
        $formacao->link = $request->link;
        $formacao->title = $request->title;
        $formacao->categoryName = $request->categoryName;
        $formacao->kindDisplayName = $request->kindDisplayName;
        $formacao->icon = $request->icon;
        $formacao->formattedDate = $request->formattedDate;
        $formacao->save();
        return $formacao;
    }

    public function bulkAdd(SalvarFormacoesRequest $request): void
    {
        $formacoesModel = collect($request->formacao)->map(function ($formacao) {
            return new Formacao([
                'link' => $formacao['link'],
                'title' => $formacao['title'],
                'categoryName' => $formacao['categoryName'],
                'kindDisplayName' => $formacao['kindDisplayName'],
                'icon' => $formacao['icon'],
                'formattedDate' => $formacao['formattedDate'],
            ]);
        })->toArray();

        Formacao::insert($formacoesModel);
    }
}
