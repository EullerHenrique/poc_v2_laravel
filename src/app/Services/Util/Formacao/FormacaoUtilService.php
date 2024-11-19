<?php

namespace App\Services\Util\Formacao;
class FormacaoUtilService
{
    public function __construct(){}

    public function formatarDatasFormacoes(array $formacoesModel): array
    {
        foreach ($formacoesModel as $formacao) {
            $formacao->formattedDate = date('d/m/Y', strtotime($formacao->dateRemoved));
            unset($formacao->dateRemoved);
        }
        return $formacoesModel;
    }
}
