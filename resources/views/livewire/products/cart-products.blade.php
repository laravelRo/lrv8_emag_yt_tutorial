 <div class="container-fluid pt-5">
     <div class="row px-xl-5">

         {{-- tabelul cu produsele din cos --}}
         <div class="col-lg-8 table-responsive mb-5">
             @include('front.product.products-table')
         </div>


         {{-- sumarul costurilor pentru cos --}}
         @if ($totalCart > 0)
             <div class="col-lg-4">
                 @auth
                     @if (!session()->get('coupon_active'))
                         <form wire:submit.prevent="applyCode" class="mb-5" action="">
                             <div class="input-group">
                                 <input wire:model="code" type="text" class="form-control p-4" placeholder="Coupon Code">

                                 <div class="input-group-append">
                                     <button class="btn btn-primary">Apply Coupon</button>
                                 </div>
                             </div>
                             @error('code')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                             @if ($user_message)
                                 <span class="text-danger">{{ $user_message }}</span>
                             @endif
                         </form>
                     @endif
                 @endauth
                 {{-- end cupon --}}

                 <div class="card border-secondary mb-5">
                     <div class="card-header bg-secondary border-0">
                         <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                     </div>

                     <div class="card-body">
                         <div class="d-flex justify-content-between mb-3 pt-1">
                             <h6 class="font-weight-medium">Products Cost</h6>
                             <h6 class="font-weight-medium">{{ $totalCart }}</h6>
                         </div>
                         <div class="d-flex justify-content-between">
                             <h6 class="font-weight-medium">Shipping</h6>
                             <h6 class="font-weight-medium">50</h6>
                         </div>
                         @if (Session::get('coupon_active'))
                             <div class="d-flex justify-content-between my-2">
                                 <h6 class="font-weight-medium">{{ Session::get('coupon_active')['description'] }}
                                     &nbsp; <button wire:click="removeCoupon" class="btn btn-danger btn-sm"
                                         title="Sterge couponul activ"><i class="fas fa-trash"></i></button>
                                 </h6>
                                 <h6 class="font-weight-medium text-info">{{ $discount }}
                                 </h6>
                             </div>
                         @endif
                     </div>
                     <div class="card-footer border-secondary bg-transparent">
                         <div class="d-flex justify-content-between mt-2">
                             <h5 class="font-weight-bold">Total</h5>
                             <h5 class="font-weight-bold">{{ $totalCart + 50 - $discount }} </h5>
                         </div>

                         @auth
                             <a href="{{ route('check') }}" class="btn btn-block btn-primary my-3 py-3">Comanda
                                 produse</a>
                         @endauth

                         @guest
                             <div class="alert alert-info mb-3">
                                 Pentru a plasa o comanda trebuie sa fiti autentificat pe site:<br>
                                 <a href="{{ route('login') }}">Login</a> - sau creati un <a
                                     href="{{ route('register') }}">cont nou</a>
                             </div>
                         @endguest
                     </div>
         @endif
         {{-- @else --}}
         {{-- <div class="alert alert-warning">Nu exista produse in cos pentru a putea fi comandate</div> --}}
         {{-- @endif --}}
     </div>
     {{-- end cart summary --}}


 </div>
 </div>
 {{-- end row --}}
 </div>
