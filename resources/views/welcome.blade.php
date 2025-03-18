@extends('layouts.app1')
@section('content')

<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <div class="deal_text">
                                <span>Offre Spéciale</span>
                            </div>
                            <h3>Burger <br>
                                Bachelor</h3>
                            <h4>Mexicain</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <div class="deal_text">
                                <span>Offre Spéciale</span>
                            </div>
                            <h3>Burger <br>
                                Bachelor</h3>
                            <h4>Mexicain</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->


<div class="best_burgers_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span>Menu Burger</span>
                    <h3>Les Meilleurs Burgers</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-xl-6 col-md-6 col-lg-6">
                <div class="single_delicious d-flex align-items-center">
                    <div class="thumb">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="info">
                        <h3>{{ $product->name }}</h3>
                        <span>{{ $product->price }} FCFA</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="iteam_links">
                    <a class="boxed-btn5" href="{{ route('menu') }}">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- features_room_startt -->
     <div class="Burger_President_area">
        <div class="Burger_President_here">
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="{{ asset('storage/assets/img/burgers/1.png') }}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>20$</span>
                            <h3>Le Burger Président</h3>
                            <p>Un excellent moyen de rendre votre entreprise plus crédible et pertinente.</p>
                            <a href="#" class="boxed-btn3">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="{{ asset('storage/assets/img/burgers/2.png') }}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>20$</span>
                            <h3>Le Burger Président</h3>
                            <p>Un excellent moyen de rendre votre entreprise plus crédible et pertinente.</p>
                            <a href="#" class="boxed-btn3">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- features_room_end -->

   <!-- début_zone_a_propos -->
<div class="about_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about_thumb2">
                    <div class="img_1">
                        <img src="{{ asset('storage/assets/img/about/1.png') }}" alt="">
                    </div>
                    <div class="img_2">
                        <img src="{{ asset('storage/assets/img/about/2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                <div class="about_info">
                    <div class="section_title mb-20px">
                        <span>À propos de nous</span>
                        <h3>Le meilleur burger <br>
                            de votre ville</h3>
                    </div>
                    <p>Il existe de nombreuses variantes de passages de Lorem Ipsum, mais la plupart ont été modifiées d'une manière ou d'une autre, par de l'humour ajouté ou des mots aléatoires qui ne semblent même pas crédibles. Si vous utilisez un passage de Lorem Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte. Tous les générateurs de Lorem Ipsum sur Internet ont tendance à répéter des blocs prédéfinis si nécessaire, ce qui en fait le premier générateur véritablement fiable sur Internet. Il utilise un dictionnaire de plus de 200 mots latins, combiné avec quelques structures de phrases modèles.</p>
                    <div class="img_thumb">
                        <img src="img/jessica-signature.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin_zone_a_propos -->

<!-- début_zone_video -->
<div class="video_area video_bg overlay">
    <div class="video_area_inner text-center">
        <h3>Burger <br>
            Bachelor</h3>
        <span>Comment nous préparons un délicieux burger</span>
        <div class="video_payer">
            <a href="https://www.youtube.com/watch?v=vLnPwxZdW4Y" class="video_btn popup-video">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
</div>
<!-- fin_zone_video -->

<!-- début_zone_témoignages -->
<div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-60 text-center">
                    <span>Témoignages</span>
                    <h3>Clients satisfaits</h3>
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
                                    <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.”</p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/assets/img/testmonial/1.png') }}" alt="">
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
                                    <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.”</p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/assets/img/testmonial/2.png') }}" alt="">
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
                                    <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.”</p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/assets/img/testmonial/3.png') }}" alt="">
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
<!-- fin_zone_témoignages -->

    <!-- testimonial_area_ned  -->

  @endsection