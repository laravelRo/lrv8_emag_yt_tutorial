 <div class="container-fluid pt-5">
     <div class="row px-xl-5">
         <div class="col-lg-6">
             <div class="mb-4">
                 <h4 class="font-weight-semi-bold mb-4">Selectati adresa de destinatie</h4>
                 @if (!$select_id)
                     <p class="text-info">Selectati adresa de destinatie</p>
                 @endif
                 <div class="row">
                     {{-- @include('front.user.address') --}}
                     @forelse($addresses as $address)
                         <div class="col-md-4 p-2 {{ $select_id == $address->id ? 'bg-warning' : '' }}">
                             <div class="card h-100 d-flex flex-column justify-content-between">
                                 <div class="card-header">

                                     <h5>{{ $address->name }}</h5>
                                     <p><b>tel: </b> {{ $address->phone }}</p>
                                 </div>
                                 <div class="card-body">
                                     <b>Oras: </b> {{ $address->city }}
                                     <b>Adresa: </b> {{ $address->address }}<br>
                                     {{ $address->observations }}
                                 </div>
                                 <div class="card-footer bg-dark text-center">
                                     <button wire:click.prevent="selectAddress({{ $address->id }})"
                                         class="btn btn-warning">Select
                                         Address</button>
                                 </div>
                             </div>
                         </div>

                     @empty
                         <div class="alert alert-warning">
                             Nu aveti nici o adresa setata pentru acest cont!
                             <a href="{{ route('address.add', Auth::id()) }}">
                                 Puteti seta o noua adresa aici -></a>
                         </div>
                     @endforelse

                 </div>
                 {{-- end form row --}}
                 @if ($select_id)
                     <div class="row mt-4">
                         <div class="col-md-12">
                             <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                 data-target="#shipping-address">Modifica adresa selectata</label>
                         </div>
                         <div class="collapse mb-4" id="shipping-address">
                             @include('front.user.address-ship')
                         </div>
                     </div>
                 @endif

             </div>
         </div>
         {{-- end 8 col --}}
         <div class="col-lg-6">
             <div class="card border-secondary mb-5">
                 <div class="card-header bg-secondary border-0">
                     <h4 class="font-weight-semi-bold m-0">Total plata</h4>
                 </div>
                 <div class="card-body">
                     <h5 class="font-weight-medium mb-3">Products</h5>
                     <table class="table">

                         <thead>
                             <th>Produs</th>
                             <th>Cant.</th>
                             <th>Pret/buc</th>
                             <th class="text-right">Pret total</th>
                         </thead>
                         <tbody>
                             @foreach (Cart::cartProducts() as $item)
                                 <tr>
                                     <td>
                                         <a href="{{ route('product', $item->product->slug) }}">{{ $item->product->name }}
                                         </a>
                                     </td>
                                     <td>{{ $item->qty }}</td>
                                     <td>{{ $item->product->price }}</td>
                                     <td class="text-right">{{ $item->product->price * $item->qty }}</td>
                                 </tr>
                             @endforeach
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td class="text-right">
                                     <h5>Cost produse: {{ number_format(Cart::totalCart(), '2', ',', '.') }}</h5>
                                     <h5>Transport: 50</h5>
                                     <hr>
                                     <h4>Total plata: {{ number_format(Cart::totalCart() + 50, '2', ',', '.') }}
                                     </h4>

                                 </td>

                             </tr>

                         </tbody>


                     </table>
                 </div>

             </div>
             <div class="card border-secondary mb-5">

                 <div class="card-footer border-secondary bg-transparent">
                     @if ($select_id)
                         <button wire:click.prevent="placeCommand"
                             class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Comanda
                             produsele</button>
                     @else
                         <div class="alert-alert-warning">
                             Nu ati selectat nici o adresa!
                         </div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
 {{-- end row --}}
 </div>
