<tr>
    <td>{{ $iteration }}</td>
    <td>{{ $item->product_name }}</td>
    <td>
        @if ($show_controls)
            <button wire:click="subQty" class="btn btn-warning btn-sm "><i
                    class="fas fa-minus-circle"></i></button>&nbsp;&nbsp;
        @endif
        {{ $item->qty }}&nbsp;&nbsp;
        @if ($show_controls)
            <button wire:click="addQty" class="btn btn-warning btn-sm "><i class="fas fa-plus-circle"></i></button>
        @endif
    </td>
    <td>{{ $item->price }}</td>
    <td>{{ number_format($item->price * $item->qty, '2', ',', '.') }}</td>
    <td>
        @if ($show_controls)
            <button onclick="deleteOrderItem('{{ $item->id }}', '{{ $item->product_name }}')"
                class="btn btn-danger btn-circle btn-md">
                <i class="fas fa-trash fa-2x"></i>
            </button>
        @endif
    </td>
</tr>
