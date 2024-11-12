<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Http\JsonResponse;
use App\Repositories\FormacaoRepository;
use App\Http\Requests\SalvarFormacaoRequest;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoRepository $formacaoRepository)
    {

    }

    public function show(): JsonResponse
    {
        $formacoes = $this->formacaoRepository->all();
        return response()->json($formacoes);
    }

    public function store(SalvarFormacaoRequest $request): JsonResponse
    {
        $formacao = $this->formacaoRepository->add($request);
        return response()->json($formacao);
    }

    public function bulkStore(SalvarFormacoesRequest $request): JsonResponse
    {
        $this->formacaoRepository->bulkAdd($request);
        return response()->json(['message' => 'Formações adicionadas com sucesso']);
    }

}
