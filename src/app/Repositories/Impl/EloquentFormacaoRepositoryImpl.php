<?php

namespace App\Repositories\Impl;

use App\Http\Requests\SalvarFormacaoRequest;
use App\Models\Formacao;
use App\Repositories\FormacaoRepository;

class EloquentFormacaoRepositoryImpl implements FormacaoRepository
{
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
}
