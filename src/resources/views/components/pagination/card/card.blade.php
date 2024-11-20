<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($infos as $info)
        <a class="col" href="{{ $info->link }}" style="text-decoration: none; color: #000;" target="_blank">
            <div class="card h-100">
                <img src="{{ $info->icon }}" alt="{{ $info->title }}" style="height: 100px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $info->title }}</h5>
                    <p class="card-text">{{ $info->categoryName }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary"> Removido em: {{ $info->formattedDate }}</small>
                </div>
            </div>
        </a>
    @endforeach
</div>
