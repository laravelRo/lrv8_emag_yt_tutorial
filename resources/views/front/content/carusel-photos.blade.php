 @if ($carusel->photos->count() > 0)
     <div id="header-carousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
             @forelse($carusel->photos->sortBy('position')->where('active',true) as $photo)
                 <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                     <img class=" img-fluid" src="{{ $carusel->galleryUrl() . $photo->name }}"
                         alt="{{ $photo->title }}">
                     <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                         <div class="p-3" style="max-width: 700px;">
                             <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                 {{ $photo->description }}</h4>
                             <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                 @if ($carusel->icon) <i class="{{ $carusel->icon }} mr-2"></i> @endif
                                 {{ $photo->title }}</h3>

                         </div>
                     </div>
                 </div>
             @empty

             @endforelse

         </div>

         <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
             <div class="btn btn-dark" style="width: 45px; height: 45px;">
                 <span class="carousel-control-prev-icon mb-n2"></span>
             </div>
         </a>
         <a class="carousel-control-next" href="#header-carousel" data-slide="next">
             <div class="btn btn-dark" style="width: 45px; height: 45px;">
                 <span class="carousel-control-next-icon mb-n2"></span>
             </div>
         </a>
     </div>
 @endif
