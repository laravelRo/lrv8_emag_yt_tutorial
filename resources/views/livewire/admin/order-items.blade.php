 <div class="card m-3 p-3">
     <div class="card-header bg-light">
         <h4>Order details: {{ $order->order_items->count() }} products <b>Total
                 cost:</b> {{ number_format($order->totalCost(), '2', ',', '.') }}
         </h4>
     </div>

     <div class="card-body">
         <div class="row my-3">
             <h5 class="text-info">Status</h5>
             <div class="col-md-4 p-1 border rounded">
                 @if ($order->approved_at)
                     <p class="text-primary">
                         <b>Approved </b>&nbsp;&nbsp;
                         <i class="fas fa-thumbs-up"></i> {{ $order->approved_at->format('d-M Y') }}
                         <button wire:click.prevent="uncheckOrder" class="btn btn-sm btn-danger"><i
                                 class="fas fa-ban"></i></button>
                     </p>
                 @else
                     <p class="text-danger">
                         <b>Pending approuval </b>&nbsp;&nbsp;
                         <button wire:click.prevent="approveOrder" class="btn btn-sm btn-primary"><i
                                 class="fas fa-check-double"></i></button>
                     </p>
                 @endif
             </div>
             <div class="col-md-4">

             </div>
             <div class="col-md-4"></div>
         </div>

         <table class="table table-striped">
             <thead class="table-dark">
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Product</th>
                     <th scope="col">Qty</th>
                     <th scope="col">Price</th>
                     <th scope="col">Cost</th>
                 </tr>
             </thead>
             <tbody>
                 @forelse($order->order_items as $item)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $item->product_name }}</td>
                         <td>{{ $item->qty }}</td>
                         <td>{{ $item->price }}</td>
                         <td>{{ number_format($item->price * $item->qty, '2', ',', '.') }}</td>
                     </tr>

                 @empty
                     <div class="alert alert-warning">
                         Aceasta comanda nu mai are produse!
                     </div>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>
