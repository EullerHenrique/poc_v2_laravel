<div class="row">
    <div class="col d-flex justify-content-end">
        <span class="mt-1 me-2">Exibir:</span>
        <div>
            <select class="form-select" onchange="location.href='{{ request()->fullUrlWithQuery(['perPage' => '']) }}'.replace('perPage=', 'perPage=' + this.value)">
                @foreach($options as $option)
                    <option value="{{ $option }}" {{ request('perPage', $options[0]) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
        <span class="mt-1 ms-2">por página</span>
    </div>
</div>
