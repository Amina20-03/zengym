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
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: 16px;
            font-weight: 300;
            line-height: 10px;
            font-family: "Poppins", sans-serif;
        }

        ul {
            list-style-type: none;
        }

        a, a:hover {
            text-decoration: none;
        }

        body {
            font-family: "Montserrat", sans-serif;
        }
        body .testimonial {
            padding: 100px 0;
        }
        body .testimonial .row .tabs {
            all: unset;
            margin-right: 50px;
            display: flex;
            flex-direction: column;
        }
        body .testimonial .row .tabs li {
            all: unset;
            display: block;
            position: relative;
        }
        body .testimonial .row .tabs li.active::before {
            position: absolute;
            content: "";
            width: 50px;
            height: 50px;
            background-color: #9352ad;
            border-radius: 50%;
        }
        body .testimonial .row .tabs li.active::after {
            position: absolute;
            content: "";
            width: 30px;
            height: 30px;
            background-color: #9352ad;
            border-radius: 50%;
        }
        body .testimonial .row .tabs li:nth-child(1) {
            align-self: flex-end;
        }
        body .testimonial .row .tabs li:nth-child(1)::before {
            left: 64%;
            bottom: -50px;
        }
        body .testimonial .row .tabs li:nth-child(1)::after {
            left: 97%;
            bottom: -81px;
        }
        body .testimonial .row .tabs li:nth-child(1) figure img {
            margin-left: auto;
        }
        body .testimonial .row .tabs li:nth-child(2) {
            align-self: flex-start;
        }
        body .testimonial .row .tabs li:nth-child(2)::before {
            right: -65px;
            top: 50%;
        }
        body .testimonial .row .tabs li:nth-child(2)::after {
            bottom: 101px;
            border-radius: 50%;
            right: -120px;
        }
        body .testimonial .row .tabs li:nth-child(2) figure img {
            margin-right: auto;
            max-width: 300px;
            width: 100%;
            margin-top: -50px;
        }
        body .testimonial .row .tabs li:nth-child(3) {
            align-self: flex-end;
        }
        body .testimonial .row .tabs li:nth-child(3)::before {
            right: -10px;
            top: -66%;
        }
        body .testimonial .row .tabs li:nth-child(3)::after {
            top: -130px;
            border-radius: 50%;
            right: -46px;
        }
        body .testimonial .row .tabs li:nth-child(3) figure img {
            margin-left: auto;
            margin-top: -50px;
        }
        body .testimonial .row .tabs li:nth-child(3):focus {
            border: 10px solid red;
        }
        body .testimonial .row .tabs li figure {
            position: relative;
        }
        body .testimonial .row .tabs li figure img {
            display: block;
        }
        body .testimonial .row .tabs li figure::after {
            content: "";
            position: absolute;
            top: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            border: 4px solid #dff9d9;
            border-radius: 50%;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        body .testimonial .row .tabs li figure:hover::after {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }
        body .testimonial .row .tabs.carousel-indicators li.active figure::after {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }
        body .testimonial .row .carousel > h3 {
            font-size: 20px;
            line-height: 1.45;
            color: rgba(0, 0, 0, 0.5);
            font-weight: 600;
            margin-bottom: 0;
        }
        body .testimonial .row .carousel h1 {
            font-size: 40px;
            line-height: 1.225;
            margin-top: 23px;
            font-weight: 700;
            margin-bottom: 0;
        }
        body .testimonial .row .carousel .carousel-indicators {
            all: unset;
            padding-top: 43px;
            display: flex;
            list-style: none;
        }
        body .testimonial .row .carousel .carousel-indicators li {
            background: #000;
            background-clip: padding-box;
            height: 2px;
        }
        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper {
            margin-top: 42px;
        }
        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper p {
            font-size: 18px;
            line-height: 1.72222;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.7);
        }
        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper h3 {
            color: #000;
            font-weight: 700;
            margin-top: 37px;
            font-size: 20px;
            line-height: 1.45;
            text-transform: uppercase;
        }

        @media only screen and (max-width: 1200px) {
            body .testimonial .row .tabs {
                margin-right: 25px;
            }
        }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->

<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
                <ol class="carousel-indicators tabs">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                        <figure>
                            <img src="https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-01-179x179.png" class="img-fluid" alt="">
                        </figure>
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">
                        <figure>
                            <img src="https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-02-306x306.png" class="img-fluid" alt="">
                        </figure>
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">
                        <figure>
                            <img src="https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-03-179x179.png" class="img-fluid" alt="">
                        </figure>
                    </li>
                </ol>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
                    <h3>
                        <?php
                        echo html_entity_decode(__('content.Notre message'));
                        ?>
                    </h3>
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="quote-wrapper">
                                <p>
                                    <?php
                                    echo html_entity_decode(__('content.We seek to make health accessible to everyone, through innovative and effective sports programs that take care of your physical and mental health.'));
                                    ?>
                                </p>
                                <h3>ZENGYMHEALTH</h3>
                            </div>
                        </div>
                        
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script>
    $(document).ready(function(){
        $(".testimonial .indicators li").click(function(){
            var i = $(this).index();
            var targetElement = $(".testimonial .tabs li");
            targetElement.eq(i).addClass('active');
            targetElement.not(targetElement[i]).removeClass('active');
        });
        $(".testimonial .tabs li").click(function(){
            var targetElement = $(".testimonial .tabs li");
            targetElement.addClass('active');
            targetElement.not($(this)).removeClass('active');
        });
    });
    $(document).ready(function(){
        $(".slider .swiper-pagination span").each(function(i){
            $(this).text(i+1).prepend("0");
        });
    });
</script>

</body>
</html>
