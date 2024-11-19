<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFormacoesRequest;
use App\Services\Dto\FormacaoDtoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormacaoController extends Controller
{
    public function __construct(private readonly FormacaoDtoService $formacaoService){}

    public function exibirPaginaFormacao(Request $request): View
    {
        $formacoes = $this->formacaoService->listarFormacoesPaginateNative($request);;
        return view('pages.formacao.index')
                ->with('formacoes', $formacoes['data'])
                ->with('links', $formacoes['links']);
    }

    public function listarFormacoes(): JsonResponse
    {
        $formacoes = $this->formacaoService->listarFormacoes();
        return response()->json($formacoes);
    }

    public function listarFormacoesPaginateLaravel(Request $request): JsonResponse
    {
        $formacoes = $this->formacaoService->listarFormacoesPaginateLaravel($request);
        return response()->json($formacoes);
    }

    public function listarFormacoesPaginateNative(Request $request): JsonResponse
    {
        $formacoes = $this->formacaoService->listarFormacoesPaginateNative($request);
        return response()->json($formacoes);
    }

    public function salvarFormacoes(SalvarFormacoesRequest $request): JsonResponse
    {
        $this->formacaoService->salvarFormacoes($request);
        return response()->json(['message' => 'Formações adicionadas com sucesso']);
    }

}
