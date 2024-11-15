<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Services\FormacaoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoService $formacaoService){}

    public function listarFormacoes(): JsonResponse
    {
        $formacoes = $this->formacaoService->listarFormacoes();
        return response()->json($formacoes);
    }

    public function listarFormacoesPaginadas(Request $request): LengthAwarePaginator
    {
        return $this->formacaoService->listarFormacoesPaginadas($request);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): JsonResponse
    {
        $this->formacaoService->salvarFormacoes($request);
        return response()->json(['message' => 'Formações adicionadas com sucesso']);
    }

}
