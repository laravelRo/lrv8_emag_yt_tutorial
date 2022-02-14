 <div id="product-carousel" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner border">
         @forelse($product->photos as $photo)
             <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                 <img class="w-100 h-100" src="/photos/products/{{ $product->id }}/{{ $photo->name }}"
                     alt="{{ $product->name }}">
             </div>
         @empty
             <div class="carousel-item active">
                 <img class="w-100 h-100" src="{{ $product->photoUrl() }}" alt="{{ $product->name }}">
             </div>
         @endforelse

     </div>
     <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
         <i class="fa fa-2x fa-angle-left text-dark"></i>
     </a>
     <a class="carousel-control-next" href="#product-carousel" data-slide="next">
         <i class="fa fa-2x fa-angle-right text-dark"></i>
     </a>
 </div>
