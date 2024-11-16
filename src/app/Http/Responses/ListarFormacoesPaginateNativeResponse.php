<?php

namespace App\Http\Responses;

class ListarFormacoesPaginateNativeResponse
{
    public function __construct(){}

    public static function new(): ListarFormacoesPaginateNativeResponse
    {
        return new self();
    }

    public function toArray(int $current_page, array $data, string $first_page_url,
                            int $from, string $last_page_url, int $last_page,
                            array $links, string $next_page_url, string $path,
                            int $per_page, string $prev_page_url, int $to, int $total): array
    {
        return [
            'current_page' => $current_page,
            'data' => $data,
            'first_page_url' => $first_page_url,
            'from' => $from,
            'last_page_url' => $last_page_url,
            'last_page' => $last_page,
            'links' => $links,
            'next_page_url' => $next_page_url,
            'path' => $path,
            'per_page' => $per_page,
            'prev_page_url' => $prev_page_url,
            'to' => $to,
            'total' => $total
        ];
    }
}
