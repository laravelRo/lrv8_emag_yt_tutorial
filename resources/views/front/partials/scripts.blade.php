 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

 <!-- Contact Javascript File -->
 <script src="{{ asset('front/mail/jqBootstrapValidation.min.js') }}"></script>
 <script src="{{ asset('front/mail/contact.js') }}"></script>

 <!-- Template Javascript -->
 <script src="{{ asset('front/js/main.js') }}"></script>
 <script src="{{ asset('front/js/custom.js') }}"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @livewireScripts

 <script>
     Livewire.on('productInCart', (message) => {
         Swal.fire({
             icon: "warning",
             title: "Produsul exista in cos",
             text: message
         });
     });

     Livewire.on('productAdded', (message) => {
         Swal.fire({
             icon: "success",
             title: "Produsul a fost adaugat in cos!",
             text: message
         });
     });
 </script>
 @yield('customJs')
