 <div class="container-fluid pt-5">
     <div class="row px-xl-5">

         {{-- tabelul cu produsele din cos --}}
         <div class="col-lg-8 table-responsive mb-5">
             @include('front.product.products-table')
         </div>

         {{-- sumarul costurilor pentru cos --}}
         <div class="col-lg-4">
             <form class="mb-5" action="">
                 <div class="input-group">
                     <input type="text" class="form-control p-4" placeholder="Coupon Code">
                     <div class="input-group-append">
                         <button class="btn btn-primary">Apply Coupon</button>
                     </div>
                 </div>
             </form>
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
                 </div>
                 <div class="card-footer border-secondary bg-transparent">
                     <div class="d-flex justify-content-between mt-2">
                         <h5 class="font-weight-bold">Total</h5>
                         <h5 class="font-weight-bold">{{ $totalCart + 50 }}</h5>
                     </div>
                     <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                 </div>
             </div>
             {{-- end cart summary --}}


         </div>
     </div>
     {{-- end row --}}
 </div>