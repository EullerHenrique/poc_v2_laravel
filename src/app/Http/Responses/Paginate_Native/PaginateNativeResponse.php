<?php

namespace App\Http\Responses\Paginate_Native;

readonly class PaginateNativeResponse
{
    public function __construct(
        private array $data,
        private array $links
    ){}

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'links' => $this->links
        ];
    }

}
