<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFormacoesRequest;
use Illuminate\Http\JsonResponse;
use App\Repositories\FormacaoRepository;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoRepository $formacaoRepository)
    {

    }

    public function listarFormacoes(): JsonResponse
    {
        $formacoes = $this->formacaoRepository->listarFormacoes();
        return response()->json($formacoes);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): JsonResponse
    {
        $this->formacaoRepository->salvarFormacoes($request);
        return response()->json(['message' => 'Formações adicionadas com sucesso']);
    }

}
