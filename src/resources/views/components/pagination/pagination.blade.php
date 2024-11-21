<div class="row">
    <div class="col-md-12 col d-flex justify-content-center">
        <div class="mt-4 mb-2">
            @foreach($links as $link)
                <a href="{{ $link['url'] }}" class = "btn {{ $link['active']? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $link['label'] }}
                </a>
          @endforeach
        </div>
    </div>
</div>
