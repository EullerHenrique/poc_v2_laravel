<?php

namespace App\Repositories;

use App\Http\Requests\SalvarFormacaoRequest;
use App\Models\Formacao;

interface FormacaoRepository
{
    public function add(SalvarFormacaoRequest $request): Formacao;
}
