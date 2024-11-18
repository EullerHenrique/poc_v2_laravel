<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alura - Formações Descontinuadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #01080e;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Alura - Formações Descontinuadas</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($formacoes as $formacao)
                    <a class="col" href="{{ $formacao->link }}" style="text-decoration: none; color: #000;" target="_blank">
                        <div class="card h-100">
                            <img src="{{ $formacao->icon }}" alt="{{ $formacao->title }}" style="height: 100px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $formacao->title }}</h5>
                                <p class="card-text">{{ $formacao->categoryName }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary"> Removido em: {{ $formacao->formattedDate }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="col d-flex justify-content-center">
                <div class="mt-4 mb-2">
                    @foreach($links as $link)
                        <a href="{{ $link['url'] }}" class = "btn {{ $link['active']? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>



