<div class="card shadow-sm p-2 mb-3 bg-body rounded">
    <div class="card-body">
        <h5 class="card-title">
            {{ $attribute->name }} @if ($attrValue)
                <span class="badge bg-success">{{ $attrValue }}</span>
                <span wire:click="detachAttribute" class="badge bg-danger" title="detach value from product"
                    style="cursor: pointer;">X</span>
            @endif
        </h5>
        @forelse($attribute->values as $value)
            @if (!($value->name == $attrValue))
                <span wire:click="attachValue('{{ $value->name }}')" class="badge bg-primary mx-2"
                    style="cursor: pointer;">{{ $value->name }}</span>
            @endif
        @empty
            <div class="alert-alert-info">
                Atributul nu are nici o valoare setata &roarr;
            </div>
        @endforelse

    </div>
</div>
