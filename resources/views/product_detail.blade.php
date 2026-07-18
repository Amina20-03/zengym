@extends('layouts.app_vitrine')

@section('content')
    <style>
        .card-wrapper{
            max-width: 100%;
            margin: 0 auto;

        }
        .product-image {
            width: 600px; /* Largeur fixe */
            height: 600px; /* Hauteur fixe */
            object-fit: cover; /* Ajuste l'image pour remplir sans déformation */
            border-radius: 10px; /* Coins arrondis optionnels */
        }
        .img-display{
            overflow: hidden;
        }
        .img-showcase{
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }
        .img-showcase img{
            min-width: 100%;
        }
        .img-select{
            display: flex;
        }
        .img-item{
            margin: 0.3rem;
        }
        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3){
            margin-right: 0;
        }
        .img-item:hover{
            opacity: 0.8;
        }
        .product-content{
            padding: 2rem 1rem;
        }
        .product-title{
            font-size: 2rem;
            text-transform: capitalize;
            font-weight: 700;
            position: relative;
            color: #12263a;
            margin: 1rem 0;
        }
        .product-title::after{
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;
            background: #12263a;
        }
        .product-link{
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 0.5rem;
            background: #256eff;
            color: #fff;
            padding: 0 0.3rem;
            transition: all 0.5s ease;
        }
        .product-link:hover{
            opacity: 0.9;
        }
        .product-rating{
            color: #ffc107;
        }
        .product-rating span{
            font-weight: 600;
            color: #252525;
        }
        .product-price{
            margin: 1rem 0;
            font-size: 1rem;
            font-weight: 700;
        }
        .product-price span{
            font-weight: 400;
        }
        .last-price span{
            color: #f64749;
            text-decoration: line-through;
        }
        .new-price span{
            color: #256eff;
        }
        .product-detail h2{
            text-transform: capitalize;
            color: #12263a;
            padding-bottom: 0.6rem;
        }
        .product-detail p{
            font-size: 0.9rem;
            padding: 0.3rem;
            opacity: 0.8;
        }
        .product-detail ul{
            margin: 1rem 0;
            font-size: 0.9rem;
        }
        .product-detail ul li{
            margin: 0;
            list-style: none;
            background: url(https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/checked.png) left center no-repeat;
            background-size: 18px;
            padding-left: 1.7rem;
            margin: 0.4rem 0;
            font-weight: 600;
            opacity: 0.9;
        }
        .product-detail ul li span{
            font-weight: 400;
        }
        .purchase-info{
            margin: 1.5rem 0;
        }
        .purchase-info input,
        .purchase-info .btn{
            border: 1.5px solid #ddd;
            border-radius: 25px;
            text-align: center;
            padding: 0.45rem 0.8rem;
            outline: 0;
            margin-right: 0.2rem;
            margin-bottom: 1rem;
        }
        .purchase-info input{
            width: 60px;
        }
        .purchase-info .btn{
            cursor: pointer;
            color: #fff;
        }
        .purchase-info .btn:first-of-type{
            background: #256eff;
        }
        .purchase-info .btn:last-of-type{
            background: #f64749;
        }
        .purchase-info .btn:hover{
            opacity: 0.9;
        }
        .social-links{
            display: flex;
            align-items: center;
        }
        .social-links a{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            color: #000;
            border: 1px solid #000;
            margin: 0 0.2rem;
            border-radius: 50%;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.5s ease;
        }
        .social-links a:hover{
            background: #000;
            border-color: transparent;
            color: #fff;
        }

        @media screen and (min-width: 992px){
            .card{
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 1.5rem;
            }
            .card-wrapper{
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .product-imgs{
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .product-content{
                padding-top: 0;
            }
        }
    </style>

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'acheter_prod','menuactive' =>''])

    <!-- Sections:Start -->
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt" style="
    background-image: url('https://img.freepik.com/photos-gratuite/groupe-femmes-travaillant_23-2148387782.jpg?t=st=1733738138~exp=1733741738~hmac=6cbf261d885e68df0716e8f9bfe1f40da7bc6f018635c9b123894425d5c36385&w=1380');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 10px -10px;
    ">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6" style="text-align: center;">
                            <h1 style="font-family: cursive;color: black">{{ __('content.acheter_prod') }} </h1>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Articles: Start -->
    <section class="section-py">
        <div class="container">
            <!-- partial:index.partial.html -->
            <div class="row">
                <div class="col-xl-12">
                    <div class = "card-wrapper">
                        <div class = "card">
                            <!-- card left -->
                            <div class = "product-imgs">
                                <div class = "img-display">
                                    <div class = "img-showcase">
                                        <img class="product-image" src = "data:image/jpg;base64,{{$detail[0]['photo'] }}" alt = "product image">
{{--                                        <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">--}}
{{--                                        <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">--}}
{{--                                        <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">--}}
                                    </div>
                                </div>
                                <div class = "img-select">
{{--                                    <div class = "img-item">--}}
{{--                                        <a href = "#" data-id = "1">--}}
{{--                                            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt = "shoe image">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class = "img-item">--}}
{{--                                        <a href = "#" data-id = "2">--}}
{{--                                            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class = "img-item">--}}
{{--                                        <a href = "#" data-id = "3">--}}
{{--                                            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class = "img-item">--}}
{{--                                        <a href = "#" data-id = "4">--}}
{{--                                            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <!-- card right -->
                            <div class = "product-content">
                                <h4 class = "product-title">{{$detail[0]['desc']}}</h4>
                                <a href = "#" class = "product-link">{{$detail[0]['code']}}</a>

                                <div class = "product-price">
                                    <p class = "new-price">{{ __('content.prix_vente_ttc') }} : <span>{{$detail[0]['prix_vente_ttc']}} DT</span></p>
                                </div>

                                <div class = "product-detail">
                                    <h2>{{ __('content.Détails') }}</h2>
                                    <ul>
                                        <li>{{ __('content.couleur') }}: <span>{{$detail[0]['couleur']}}</span></li>
                                        <li>{{ __('content.dosage') }}: <span>{{$detail[0]['dosage']}}</span></li>
                                        <li>{{ __('content.categorie') }}: <span>{{$detail[0]['categ_produit_desc']}}</span></li>

                                    </ul>
                                </div>

                                <div class = "purchase-info">
                                    <form action="{{route('shop.produit.cart_store',$detail[0]['id'])}}" method="POST">
                                        @csrf
                                        <input type = "number" min = "0" value = "1" name="quantity">
                                        <button type="submit" class = "btn" style="margin-top: 13px">
                                            <input type = "hidden"  name="product_code" value="{{$detail[0]['code']}}">
                                            <input type = "hidden"  name="product_desc" value="{{$detail[0]['desc']}}">
                                            <input type = "hidden"  name="product_price" value="{{$detail[0]['prix_vente_ttc']}}">
                                            {{ __('content.Ajouter au panier') }}&nbsp;&nbsp; <i class = "fa fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- partial -->
        </div>
    </section>
    <!-- Popular Articles: End -->

    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage(){
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script>

@endsection
