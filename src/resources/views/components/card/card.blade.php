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
