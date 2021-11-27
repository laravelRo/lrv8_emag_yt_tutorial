<div>

    {{-- --- butonul de status --}}
    @if ($model->active)

        <button wire:click="changeStatus('active')" class="btn btn-success">Activ</button>
    @else
        <button wire:click="changeStatus('active')" class="btn btn-danger">Inactiv</button>
    @endif

    {{-- ---- butonul promovat / standard --}}
    @if ($model->promo)
        <button wire:click="changeStatus('promo')" class="btn btn-success">Promovat</button>
    @else
        <button wire:click="changeStatus('promo')" class="btn btn-danger">Standard</button>
    @endif

</div>
