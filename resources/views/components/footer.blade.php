        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Jhabis Food Mart</h1>
                                <p class="text-secondary mb-0">Trusted, Preferred, Quality, Enriching</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                           @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('subscribe'))
                            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                                <h6> {{ session('subscribe') }} </h6>
                            </div>
                        @endif
                            <div class="position-relative mx-auto">

                        <form action="{{ route('subscribe') }}" id="subscribe-form" method="get">
                            @csrf
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" name="email" type="email" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </form>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Who we are</h4>
                            <p class="mb-4">To be the most trusted, preferred and leading food processing and packaging company, renowed for producing high quality, netritious, delicious, and safe food products that exceed customer expectations and enrich the lives of our customers and communities</p>
                            <a href="{{ url('/about') }}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Info</h4>
                            <a class="btn-link" href="{{ url('/about') }}">About Us</a>
                            <a class="btn-link" href="{{ url('/contact') }}">Contact Us</a>
                            <a class="btn-link" href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                            <a class="btn-link" href="{{ url('/terms-of-service') }}">Terms & Condition</a>
                            <a class="btn-link" href="{{ url('/returns-and-refund') }}">Return Policy</a>
                            <a class="btn-link" href="{{ url('/faq') }}">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="{{ url('/dashboard') }}">My Account</a>
                            <a class="btn-link" href="{{ url('/cart') }}">Shopping Cart</a>
                            <a class="btn-link" href="{{ url('/wishlist') }}">Wishlist</a>
                            <a class="btn-link" href="{{ url('/orders') }}">Order History</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: Sani Abacha bye pass, tipper garage mobile, behind khayaj filling station,Birnin kebbi, kebbi state.</p>
                            <p>Email: jhabisfoodmart@gmail.com</p>
                            <p>WhatsApp: 07063656998, </p>
                            <p>Phone: 0703 305 7020, 08062354930 </p>
                            <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Jhabis Food Mart</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Developed By <a class="border-bottom" href="www.africicl.com.ng">AfricTech</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
<script type="text/javascript">
    $(document).ready(function () {
        $('#subscribe-form').on('submit', function (e) {
            e.preventDefault();  // Prevent normal form submission

            var form = $(this);
            var email = form.find('input[name="email"]').val();
            var submitButton = form.find('button[type="submit"]');

            // Simple validation
            if (email === '') {
                alert('Please enter a valid email address.');
                return;
            }

            // Change button text to "Loading..." and disable the button
            submitButton.prop('disabled', true);
            submitButton.text('Subscribing...');

            // Send AJAX request
            $.ajax({
                url: form.attr('action'),
                type: 'GET',
                data: form.serialize(),  // Serialize form data
                success: function (response) {
                    // Show success message
                    Swal.fire({
                        text: 'Subscription successful, Thank you!',
                        icon: 'success',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    // Optionally clear the input field after successful subscription
                    form.find('input[name="email"]').val('');

                    // Reset button text and enable it
                    submitButton.prop('disabled', false);
                    submitButton.text('Subscribe Now');
                },
                error: function (xhr) {
                    // Handle error if any
                    Swal.fire({
                        text: 'This email has already been subscribed.!',
                        icon: 'error',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    // Reset button text and enable it
                    submitButton.prop('disabled', false);
                    submitButton.text('Subscribe Now');
                }
            });
        });
    });
</script>
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>