@include('components.header')
@include('components.nav')
<?php 
  use App\Models\Product;
?>
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Product Details</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-white">Product Detail</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="{{ $product->image_url }}" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{ $product->product_name }}</h4>
                                <p class="mb-3">Category: {{ $category->category_name }}</p>
                                <h5 class="fw-bold mb-3">₦
                                <?php $discounted_price = Product::getDiscountedPrice($product->id); ?>

                                @if ($discounted_price > 0)
                                    {{ $discounted_price }}
                                    <span class="text-danger text-decoration-line-through">₦ {{ $product->product_price }}</span>
                                @else
                                    {{ $product->product_price }}
                                @endif
                                </h5>
                                <div class="d-flex mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star {{ $i <= $averageRating ? 'text-secondary' : 'text-lol' }}"></i>
                                    @endfor
                                </div>
                                <p class="mb-4">{{ \Illuminate\Support\Str::words($product->description, 60, '...') }}</p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <form id="cart-form" action="{{ route('add-to-shopping-cart') }}" method="GET">
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="hidden" id="number_qaun" class="number_qaun" name="quantity" min="1"
                                        value="1">
                                    <button id="addCart"
                                        data-product-id="{{ $product->id }}" class="btn shop-btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p>{{ $product->description }}</p>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">{{ $product->product_weight }} kg</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Organic</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Сheck</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Healthy</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    @if ($reviews->isEmpty())
                                        <p>No reviews yet. Be the first to review this product!</p>
                                    @else
                                        @foreach ($reviews as $review)
                                            <div class="d-flex mb-4">
                                                <!-- Avatar -->
                                                <img src="{{ $review->customer->avatar ?? asset('images/front_images/homepage-one/aurthor-img-1.webp') }}"
                                                     class="img-fluid rounded-circle p-3"
                                                     style="width: 100px; height: 100px;" alt="">

                                                <!-- Review Content -->
                                                <div>
                                                    <p class="mb-2" style="font-size: 14px;">
                                                        {{ \Carbon\Carbon::parse($review->created_at)->format('F d, Y') }}
                                                    </p>
                                                    <div class="d-flex justify-content-between">
                                                        <h5>
                                                            @if ($review->customer)
                                                                {{ $review->customer->first_name }} {{ $review->customer->last_name }}
                                                            @else
                                                                Anonymous
                                                            @endif
                                                        </h5>

                                                        <!-- Star Ratings -->
                                                        <div class="d-flex mb-3 ms-3">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fa fa-star {{ $i <= $review->rating ? 'text-secondary' : '' }}"></i>
                                                            @endfor
                                                        </div>
                                                    </div>

                                                    <!-- Review Text -->
                                                    <p>
                                                        {{ $review->review ?? 'Not specified' }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    </div><!-- 
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div> -->
                                </div>
                            </div><!-- 
                            <form action="#">
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="email" class="form-control border-0" placeholder="Your Email *">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="search something healthy" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                                <div class="mb-4">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        @foreach($categories as $categorie)
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>{{ $categorie->category_name }}</a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->

<div id="toast-container" aria-live="polite" aria-atomic="true">
    <div id="toast" class="toast" style="font-weight: bolder;"></div>
</div>


@include('components.footer')