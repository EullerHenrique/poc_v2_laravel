<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacaoRequest;
use App\Http\Requests\SalvarFormacoesRequest;
use App\Models\Formacao;

interface FormacaoRepository
{
    public function add(SalvarFormacaoRequest $request): Formacao;

    public function all();

    public function bulkAdd(SalvarFormacoesRequest $request);
}
