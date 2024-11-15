<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Services\FormacaoService;
use Illuminate\Http\JsonResponse;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoService $formacaoService){}

    public function listarFormacoes(): JsonResponse
    {
        $formacoes = $this->formacaoService->listarFormacoes();
        return response()->json($formacoes);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): JsonResponse
    {
        $this->formacaoService->salvarFormacoes($request);
        return response()->json(['message' => 'Formações adicionadas com sucesso']);
    }

}
