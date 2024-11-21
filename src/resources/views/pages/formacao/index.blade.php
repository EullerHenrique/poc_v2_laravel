<x-layout title="Alura - Formações Descontinuadas">
    <x-pagination.per_page :options="[16, 36, 56, 76, 96, 206, 406, 1006]"></x-pagination.per_page>
    <x-pagination.card :infos="$formacoes"></x-pagination.card>
    <x-pagination :links="$links"></x-pagination>
</x-layout>
