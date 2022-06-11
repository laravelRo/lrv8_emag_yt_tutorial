 <div class="card m-3 p-3">
     <div class="card-header bg-light">
         <h4>Order details: {{ $order->order_items->count() }} products <b>Total
                 cost:</b> {{ number_format($order->totalCost(), '2', ',', '.') }} &nbsp;
             Name: <span class="text-primary">{{ $order->user->name }}</span> <span
                 class="text-danger">{{ $order->user->id }}</span>
         </h4>
     </div>

     <div class="card-body">
         <div class="row my-3">
             <h5 class="text-info">Status</h5>
             <div class="col-md-4 p-1 border rounded">
                 @if ($order->approved_at)
                     <p class="text-primary">
                         <span class="badge bg-success p-2">Approved at </span>&nbsp;&nbsp;
                         <i class="fas fa-thumbs-up"></i> {{ $order->approved_at->format('d-M Y') }}
                         <button wire:click.prevent="uncheckOrder" class="btn btn-sm btn-danger float-end"><i
                                 class="fas fa-ban"></i></button>
                     </p>
                 @else
                     <p class="text-danger">
                         <span class="badge bg-danger p-2">Pending approuval </span>&nbsp;&nbsp;
                         <button wire:click.prevent="approveOrder" class="btn btn-sm btn-success float-end"><i
                                 class="fas fa-check-double"></i></button>
                     </p>
                 @endif
             </div>
             <div class="col-md-4 p-1 border rounded">
                 @if ($order->approved_at)
                     @if ($order->payed_at)
                         <p class="text-primary">
                             <span class="badge bg-success p-2">Order payed at </span>&nbsp;&nbsp;
                             <i class="fas fa-thumbs-up"></i> {{ $order->payed_at->format('d-M Y') }}
                             <button wire:click.prevent="unpayedOrder" class="btn btn-sm btn-danger float-end"><i
                                     class="fas fa-ban"></i></button>
                         </p>
                     @else
                         <p class="text-danger">
                             <span class="badge bg-danger p-2">Pending payment </span>&nbsp;&nbsp;
                             <button wire:click.prevent="payedOrder" class="btn btn-sm btn-success float-end"><i
                                     class="fas fa-check-double"></i></button>
                         </p>
                     @endif
                 @endif
             </div>
             <div class="col-md-4 p-1 border rounded">
                 @if ($order->payed_at)
                     @if ($order->recivied_at)
                         <p class="text-primary">
                             <span class="badge bg-success p-2">Order recivied at </span>&nbsp;&nbsp;
                             <i class="fas fa-thumbs-up"></i> {{ $order->recivied_at->format('d-M Y') }}
                             <button wire:click.prevent="unreciviedOrder" class="btn btn-sm btn-danger float-end"><i
                                     class="fas fa-ban"></i></button>
                         </p>
                     @else
                         <p class="text-danger">
                             <span class="badge bg-danger p-2">Pending recivement</span>&nbsp;&nbsp;
                             <button wire:click.prevent="reciviedOrder" class="btn btn-sm btn-success float-end"><i
                                     class="fas fa-check-double"></i></button>
                         </p>
                     @endif
                 @endif
             </div>

         </div>

         <table class="table table-striped">
             <thead class="table-dark">
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Product</th>
                     <th scope="col">Qty</th>
                     <th scope="col">Price</th>
                     <th scope="col">Cost</th>
                     <th scope="col">Action</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                     $show_controls = $order->payed_at ? null : true;
                 @endphp
                 @forelse($order->order_items as $item)
                     @livewire(
                         'admin.item',
                         [
                             'iteration' => $loop->iteration,
                             'item' => $item,
                             'show_controls' => $show_controls,
                         ],
                         key(time() . '_' . $item->id),
                     )
                 @empty
                     <div class="alert alert-warning">
                         Aceasta comanda nu mai are produse!
                     </div>
                 @endforelse
             </tbody>
         </table>
         @if (!($order->payed_at or $order->recivied_at))
             <hr>
             <div class="row">

                 <label class="col-sm-2 my-3 col-form-label">
                     <b>Add Product to order by id </b>
                 </label>

                 <div class="col-md-2 my-3">
                     <input wire:model="id_new" type="number" class="form-control">
                 </div>
                 <div class="col-md-1 my-3">
                     <button wire:click.prevent="addProduct" class="btn btn-primary">Add</button>
                 </div>
             </div>
         @endif
     </div>
 </div>
