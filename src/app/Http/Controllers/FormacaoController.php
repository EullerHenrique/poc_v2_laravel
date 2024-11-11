<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Repositories\FormacaoRepository;
use App\Http\Requests\SalvarFormacaoRequest;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoRepository $formacaoRepository)
    {

    }

    public function store(SalvarFormacaoRequest $request): JsonResponse
    {
        $formacao = $this->formacaoRepository->add($request);
        return response()->json($formacao);
    }

}
