<x-layout title="Alura - Formações Descontinuadas">
    <x-pagination.per_page></x-pagination.per_page>
    <x-pagination.card :infos="$formacoes"></x-pagination.card>
    <x-pagination :links="$links"></x-pagination>
</x-layout>
