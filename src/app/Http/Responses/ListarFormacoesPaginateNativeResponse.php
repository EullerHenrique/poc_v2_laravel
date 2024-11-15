<?php

namespace App\Http\Responses;

class ListarFormacoesPaginateNativeResponse
{
    public function __construct(){}

    public static function new(): ListarFormacoesPaginateNativeResponse
    {
        return new self();
    }

    public function toArray(int $current_page, array $data): array
    {
        return [
            'current_page' => $current_page,
            'data' => $data
        ];
    }
}
