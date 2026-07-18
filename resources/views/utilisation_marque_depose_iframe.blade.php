<!DOCTYPE html>
<html
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
        class="light-style layout-wide layout-navbar-fixed layout-menu-fixed"
        dir="{{ __('content.layout') }}"
        data-theme="theme-default"
        data-assets-path="{{\Illuminate\Support\Facades\URL::asset('/assets/')}}"
        data-framework="laravel"
        data-template="vertical-menu-theme-default-light"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://public.codepenassets.com/css/normalize-5.0.0.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");

        html, body {
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            display: flex;
        }

        .blog-slider {
            width: 80%;
            position: relative;
            max-width: 88%;
            margin: auto;
            background-color: white;
            box-shadow: 0px 14px 80px rgba(237, 237, 237, 0.82);
            padding: 25px;
            border-radius: 25px;
            height: 400px;
            transition: all 0.3s;
        }
        @media screen and (max-width: 992px) {
            .blog-slider {
                max-width: 680px;
                height: 400px;
            }
        }
        @media screen and (max-width: 768px) {
            .blog-slider {
                min-height: 500px;
                height: auto;
                margin: 180px auto;
            }
        }
        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider {
                height: 350px;
            }
        }

        .blog-slider__item {
            display: flex;
            align-items: center;
        }
        @media screen and (max-width: 768px) {
            .blog-slider__item {
                flex-direction: column;
            }
        }

        .blog-slider__item.swiper-slide-active .blog-slider__img img {
            opacity: 1;
            transition-delay: 0.3s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content > * {
            opacity: 1;
            transform: none;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(1) {
            transition-delay: 0.3s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(2) {
            transition-delay: 0.4s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(3) {
            transition-delay: 0.5s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(4) {
            transition-delay: 0.6s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(5) {
            transition-delay: 0.7s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(6) {
            transition-delay: 0.8s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(7) {
            transition-delay: 0.9s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(8) {
            transition-delay: 1s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(9) {
            transition-delay: 1.1s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(10) {
            transition-delay: 1.2s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(11) {
            transition-delay: 1.3s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(12) {
            transition-delay: 1.4s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(13) {
            transition-delay: 1.5s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(14) {
            transition-delay: 1.6s;
        }
        .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(15) {
            transition-delay: 1.7s;
        }

        .blog-slider__img {
            width: 350px;
            flex-shrink: 0;
            height: 300px;
            box-shadow: 4px 13px 30px 1px rgba(236, 236, 236, 0.2);
            border-radius: 20px;
            transform: translateX(-80px);
            overflow: hidden;
            background: #f8f8f8;
        }
        .blog-slider__img::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(147deg, #ececec 0%, #a6a5a5 74%);
            border-radius: 20px;
            opacity: 0.1;
        }
        @media screen and (max-width: 768px) {
            .blog-slider__img {
                transform: translateY(-50%);
                width: 90%;
            }
        }
        @media screen and (max-width: 576px) {
            .blog-slider__img {
                width: 95%;
            }
        }
        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider__img {
                height: 270px;
            }
        }

        .blog-slider__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 1;
            border-radius: 20px;
            transition: all 0.3s;
            
        }

        .blog-slider__content {
            padding-right: 25px;
        }
        @media screen and (max-width: 768px) {
            .blog-slider__content {
                margin-top: -80px;
                text-align: center;
                padding: 0 30px;
            }
        }
        @media screen and (max-width: 576px) {
            .blog-slider__content {
                padding: 0;
            }
        }

        .blog-slider__content > * {
            opacity: 0;
            transform: translateY(25px);
            transition: all 0.4s;
        }

        .blog-slider__code {
            color: #7b7992;
            margin-bottom: 15px;
            display: block;
            font-weight: 500;
        }

        .blog-slider__title {
            font-size: 24px;
            font-weight: 700;
            color: #0d0925;
            margin-bottom: 20px;
        }

        .blog-slider__text {
            color: #4e4a67;
            margin-bottom: 30px;
            line-height: 1.5em;
        }

        .blog-slider__button {
            display: inline-flex;
            background-image: linear-gradient(147deg, #b784cc 0%, #9352ad 74%);
            padding: 15px 35px;
            border-radius: 50px;
            color: #fff;
            box-shadow: 0px 14px 80px #922fb1;
            text-decoration: none;
            font-weight: 500;
            justify-content: center;
            text-align: center;
            letter-spacing: 1px;
        }
        @media screen and (max-width: 576px) {
            .blog-slider__button {
                width: 50%;
            }
        }

        .blog-slider .swiper-container-horizontal > .swiper-pagination-bullets,
        .blog-slider .swiper-pagination-custom,
        .blog-slider .swiper-pagination-fraction {
            bottom: 10px;
            left: 0;
            width: 100%;
        }

        .blog-slider__pagination {
            position: absolute;
            z-index: 21;
            right: 20px;
            width: 11px !important;
            text-align: center;
            left: auto !important;
            top: 50%;
            bottom: auto !important;
            transform: translateY(-50%);
        }
        @media screen and (max-width: 768px) {
            .blog-slider__pagination {
                transform: translateX(-50%);
                left: 50% !important;
                top: 205px;
                width: 100% !important;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 8px 0;
        }
        @media screen and (max-width: 768px) {
            .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
                margin: 0 5px;
            }
        }

        .blog-slider__pagination .swiper-pagination-bullet {
            width: 11px;
            height: 11px;
            display: block;
            border-radius: 10px;
            background: #062744;
            opacity: 0.2;
            transition: all 0.3s;
        }

        .blog-slider__pagination .swiper-pagination-bullet-active {
            opacity: 1;
            background: #9352ad;
            height: 30px;
            box-shadow: 0px 0px 20px #922fb1;
        }
        @media screen and (max-width: 768px) {
            .blog-slider__pagination .swiper-pagination-bullet-active {
                height: 11px;
                width: 30px;
            }
        }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->
<!-- fork https://codepen.io/JavaScriptJunkie/pen/WgRBxw?editors=0110 -->

<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <!-- 		 -->
        <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
                <img src="{{\Illuminate\Support\Facades\URL::asset('images/image20.jpg')}}" alt="">

            </div>
            <div class="blog-slider__content">
                <span class="blog-slider__code">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" alt="" style="width: 150px">
                </span>
                <div class="blog-slider__title">
                    <?php
                    echo html_entity_decode(__('content.Utilisation de Marque déposée'));
                    ?>
                </div>
                <div class="blog-slider__text">
                    <?php
                    echo html_entity_decode(__('content.ZENGYM® est une marque déposée. La marque ZENGYM® protège les consommateurs en identifiant ZENGYM HEALTH et ses affiliés comme la source officielle de programmes d’entraînement, de produits de qualité et de services offerts sous l’enseigne ZENGYM®'));
                    ?>
                </div>
                <a href="#" class="blog-slider__button">
                    <?php
                    echo html_entity_decode(__('content.Read More'));
                    ?>
                </a>
            </div>
        </div>
        <!-- 		 -->
        <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
                <img src="{{\Illuminate\Support\Facades\URL::asset('images/image20.jpg')}}" alt="">
            </div>
            <div class="blog-slider__content">
                <span class="blog-slider__code">
                      <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" alt="" style="width: 150px">
                </span>
                <div class="blog-slider__title">
                    <?php
                    echo html_entity_decode(__('content.Utilisation correcte de la marque ZENGYM® :'));
                    ?>
                </div>
                <div class="blog-slider__text">
                    <?php
                    echo html_entity_decode(__('content.Utilisez la marque déposée ZENGYM® accompagnée d’une description claire du service ou du produit, par exemple :'));
                    ?>
                    <ul>
                        <li>

                            <?php
                            echo html_entity_decode(__('content.ZENGYM® session'));
                            ?>
                        </li>
                        <li>

                            <?php
                            echo html_entity_decode(__('content.ZENGYM® coach'));
                            ?>
                        </li>
                        <li>

                            ...
                        </li>

                    </ul>
                </div>

                <a href="#" class="blog-slider__button">
                    <?php
                    echo html_entity_decode(__('content.Read More'));
                    ?>
                </a>
            </div>
        </div>
        <!--  -->
        <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
                <img src="{{\Illuminate\Support\Facades\URL::asset('images/image20.jpg')}}" alt="">
            </div>
            <div class="blog-slider__content">
                <span class="blog-slider__code">
                         <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" alt="" style="width: 150px">
                </span>
                <div class="blog-slider__title">
                    <?php
                    echo html_entity_decode(__('content.Avis de marque déposée :'));
                    ?>
                </div>
                <div class="blog-slider__text">
                    <?php
                    echo html_entity_decode(__('content.“ZENGYM® et les logos ZENGYM sont des marques déposées de ZENGYM HEALTH, utilisées avec autorisation.”'));
                    ?>
                </div>

                <a href="#" class="blog-slider__button">
                    <?php
                    echo html_entity_decode(__('content.Read More'));
                    ?>
                </a>
            </div>
        </div>
    </div>
    <div class="blog-slider__pagination"></div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
<script>
    var swiper = new Swiper('.blog-slider', {
        spaceBetween: 30,
        effect: 'fade',
        loop: true,
        mousewheel: {
            invert: false,
        },
        // autoHeight: true,
        pagination: {
            el: '.blog-slider__pagination',
            clickable: true,
        }
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        window.parent.postMessage({
            type: 'iframe-resize',
            height: document.body.scrollHeight
        }, '*');
    });
</script>
</body>
</html>
