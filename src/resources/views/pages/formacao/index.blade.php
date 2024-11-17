<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formações Descontinuadas Alura</title>
</head>
<body>
    <h1>Formações Descontinuadas Alura </h1>

    @foreach($formacoes as $formacao)
        <p>{{ $formacao->title }}</p>
        <p>{{ $formacao->link }}</p>
        <img src="{{ $formacao->icon }}" alt="{{ $formacao->title }}" style="width: 100px; height: 100px;">
        <p>{{ $formacao->categoryName }}</p>
        <p>{{ $formacao->kindDisplayName }}</p>
        <p>{{ $formacao->formattedDate }}</p>
    @endforeach

    @foreach($links as $link)
       <a href="{{ $link['url'] }}">{{ $link['label'] }} {{ $link['active']?'Sim':'Não' }}</a>
    @endforeach
</body>
</html>



