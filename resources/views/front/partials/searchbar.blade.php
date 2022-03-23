 <div class="row align-items-center py-3 px-xl-5">
     <div class="col-lg-3 d-none d-lg-block">
         <a href="{{ route('home') }}" class="text-decoration-none">
             <h1 class="m-0 display-5 font-weight-semi-bold"><span
                     class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
         </a>
     </div>
     <div class="col-lg-6 col-6 text-left">
         <form action="">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Search for products">
                 <div class="input-group-append">
                     <span class="input-group-text bg-transparent text-primary">
                         <i class="fa fa-search"></i>
                     </span>
                 </div>
             </div>
         </form>
     </div>
     <div class="col-lg-3 col-6 text-right">
         <a href="" class="btn border">
             <i class="fas fa-heart text-primary"></i>
             <span class="badge">0</span>
         </a>
         @livewire('products.count-cart')
     </div>
 </div>
