<?php

namespace App\Http\Responses;

class ListarFormacoesPaginateNativeResponse
{
    private int $current_page;
    private array $data;
    private string $first_page_url;
    private int $from;
    private string $last_page_url;
    private int $last_page;
    private array $links;
    private string $next_page_url;
    private string $path;
    private int $per_page;
    private string $prev_page_url;
    private int $to;
    private int $total;

    public function __construct(){}


    public function toArray(): array
    {
        return [
            'current_page' => $this->getCurrentPage(),
            'data' => $this->getData(),
            'first_page_url' => $this->getFirstPageUrl(),
            'from' => $this->getFrom(),
            'last_page_url' => $this->getLastPageUrl(),
            'last_page' => $this->getLastPage(),
            'links' => $this->getLinks(),
            'next_page_url' => $this->getNextPageUrl(),
            'path' => $this->getPath(),
            'per_page' => $this->getPerPage(),
            'prev_page_url' => $this->getPrevPageUrl(),
            'to' => $this->getTo(),
            'total' => $this->getTotal(),
        ];
    }

    public function getCurrentPage(): int
    {
        return $this->current_page;
    }

    public function setCurrentPage(int $current_page): void
    {
        $this->current_page = $current_page;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getFirstPageUrl(): string
    {
        return $this->first_page_url;
    }

    public function setFirstPageUrl(string $first_page_url): void
    {
        $this->first_page_url = $first_page_url;
    }

    public function getFrom(): int
    {
        return $this->from;
    }

    public function setFrom(int $from): void
    {
        $this->from = $from;
    }

    public function getLastPageUrl(): string
    {
        return $this->last_page_url;
    }

    public function setLastPageUrl(string $last_page_url): void
    {
        $this->last_page_url = $last_page_url;
    }

    public function getLastPage(): int
    {
        return $this->last_page;
    }

    public function setLastPage(int $last_page): void
    {
        $this->last_page = $last_page;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function setLinks(array $links): void
    {
        $this->links = $links;
    }

    public function getNextPageUrl(): string
    {
        return $this->next_page_url;
    }

    public function setNextPageUrl(string $next_page_url): void
    {
        $this->next_page_url = $next_page_url;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getPerPage(): int
    {
        return $this->per_page;
    }

    public function setPerPage(int $per_page): void
    {
        $this->per_page = $per_page;
    }

    public function getPrevPageUrl(): string
    {
        return $this->prev_page_url;
    }

    public function setPrevPageUrl(string $prev_page_url): void
    {
        $this->prev_page_url = $prev_page_url;
    }

    public function getTo(): int
    {
        return $this->to;
    }

    public function setTo(int $to): void
    {
        $this->to = $to;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }



}
