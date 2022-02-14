 <div class="container-fluid pt-5">
     <div class="text-center mb-4">
         <h2 class="section-title px-5"><span class="px-2">Recomended Categories</span></h2>
     </div>
     <div class="row px-xl-5 pb-3">
         @foreach ($trandy_categories as $trandy_categ)
             <div class="col-lg-4 col-md-6 pb-1">
                 <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                     <p class="text-right">{{ $trandy_categ->products_count }} Products</p>
                     <a href="{{ route('category', $trandy_categ->slug) }}"
                         class="cat-img position-relative overflow-hidden mb-3">
                         <img class="img-fluid" src="{{ $trandy_categ->photoUrl() }}" alt="">
                     </a>
                     <h5 class="font-weight-semi-bold m-0">{{ $trandy_categ->name }}</h5>
                 </div>
             </div>
         @endforeach

     </div>
 </div>
