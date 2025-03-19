@extends('layouts.app1')
@section('content')

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay">
        <h3>Menu</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- best_burgers_area_start  -->
    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Burger Menu</span>
                        <h3>Meilleur des Burgers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-xl-6 col-md-6 col-lg-6">
                    <div class="single_delicious d-block text-center">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200" height="200">
                        </div>
                        <div class="info">
                            <h3>{{ $product->name }}</h3>
                            <span>{{ $product->price }} FCFA</span>
                            <form class="add-to-cart-form" action="{{ route('cart.add.menu') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control-sm" style="width: 50px;">
                                <button type="submit" class="btn btn-sm btn-outline-warning">
                                    <i class="fa fa-shopping-basket"></i> Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- best_burgers_area_end  -->

    <!-- features_room_startt -->
    <div class="Burger_President_area">
            <div class="Burger_President_here">
                <div class="single_Burger_President">
                    <div class="room_thumb">
                        <img src="img/burgers/1.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>$20</span>
                                <h3>The Burger President</h3>
                                <p>Great way to make your business appear trust <br> and relevant.</p>
                                <a href="#" class="boxed-btn3">Order Now</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="single_Burger_President">
                    <div class="room_thumb">
                        <img src="img/burgers/2.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>$20</span>
                                <h3>The Burger President</h3>
                                <p>Great way to make your business appear trust <br> and relevant.</p>
                                <a href="#" class="boxed-btn3">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- features_room_end -->

    <!-- testimonial_area_start  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <span>Testimonials</span>
                        <h3>Happy Customers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/1.png" alt="">
                                            </div>
                                            <h4>Kristiana Chouhan</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/2.png" alt="">
                                            </div>
                                            <h4>Arafath Hossain</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/3.png" alt="">
                                            </div>
                                            <h4>A.H Shemanto</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- testimonial_area_ned  -->

@endsection