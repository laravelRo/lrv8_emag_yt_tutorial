 <tr>
     <td class="text-left">
         <a href="{{ route('product', $item->product->slug) }}">
             <img src=" {{ $item->product->photoUrl() }}" alt="" style=" width: 50px;">
             {{ $item->product->name }} / <span class="text-info">{{ $item->product->brand->name }}</span>
         </a>
     </td>
     <td class="align-middle">{{ $item->product->price }}</td>
     <td class="align-middle">
         <div class="input-group quantity mx-auto" style="width: 100px;">
             <div class="input-group-btn">
                 <button wire:click="qtySub" class="btn btn-sm btn-primary btn-minus">
                     <i class="fa fa-minus"></i>
                 </button>
             </div>
             <input wire:model.lazy="qty" type="text"
                 class="form-control form-control-sm bg-secondary text-center">
             <div class="input-group-btn">
                 <button wire:click="qtyAdd" class="btn btn-sm btn-primary btn-plus">
                     <i class="fa fa-plus"></i>
                 </button>
             </div>
         </div>
     </td>
     <td class="align-middle">{{ $item->product->price * $item->qty }}</td>
     <td class="align-middle"><button onclick="confirmDeleteItem('{{ $item->id }}', '{{ $item->product->name }}')"
             class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
     </td>
 </tr>
