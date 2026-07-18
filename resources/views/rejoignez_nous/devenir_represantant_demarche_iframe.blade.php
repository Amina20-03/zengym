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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://public.codepenassets.com/css/reset-2.0.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
        @charset "UTF-8";
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Maven+Pro:wght@800&display=swap");
        :root {
            --font-size: 0.8em;
            --bg1: white;
            --blue: #3498db;
            --green: #2ecc71;
            --purple: #9b59b6;
            --gold: #f1c40f;
            --red: #e74c3c;
            --orange: #e67e22;
            --shadow1: 0 2px 4px #00000026, 0 3px 6px #0000001f;
            --shadow2: 0 2px 6px #00000044, 0 4px 7px #00000022;
        }

        main {
            padding: 2vw;
            background-color: white;
        }

        ul.infoGraphic {
            font-size: var(--font-size);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        ul.infoGraphic li {
            position: relative;
            width: 100%;
            max-width: 25em;
            background: var(--bg1);
            border-radius: 0.5em;
            padding: 0.5em;
            z-index: 1;
            transition: all 0.2s;
            cursor: pointer;
        }
        ul.infoGraphic li .numberWrap {
            position: absolute;
        }
        ul.infoGraphic li .number {
            font-family: "maven pro", sans-serif;
            font-size: 13em;
            font-weight: 900;
            width: 0.9em;
            text-align: center;
        }
        ul.infoGraphic li .number.fontColor1 {
            color: var(--blue);
        }
        ul.infoGraphic li .number.fontColor2 {
            color: var(--green);
        }
        ul.infoGraphic li .number.fontColor3 {
            color: var(--purple);
        }
        ul.infoGraphic li .number.fontColor4 {
            color: var(--gold);
        }
        ul.infoGraphic li .number.fontColor5 {
            color: var(--red);
        }
        ul.infoGraphic li .number.fontColor6 {
            color: var(--orange);
        }
        ul.infoGraphic li .coverWrap {
            transform: rotate(130deg);
            position: absolute;
            width: 18em;
            height: 15em;
            left: -3em;
            top: -1em;
        }
        ul.infoGraphic li .coverWrap .numberCover {
            position: absolute;
            background: var(--bg1);
            width: 18em;
            height: 6em;
            border-radius: 50% 50% 0 0;
            border-bottom: 3px solid #f5f8f7;
            transition: all 0.4s;
        }
        ul.infoGraphic li .coverWrap .numberCover::before {
            position: absolute;
            content: "";
            bottom: 5px;
            left: 4em;
            right: 4em;
            top: 5em;
            box-shadow: 0 0 30px 17px #48668577;
            border-radius: 100px/10px;
            z-index: -1;
        }
        ul.infoGraphic li .coverWrap .numberCover::after {
            position: absolute;
            bottom: 0;
            content: "";
            left: -10%;
            width: 120%;
            height: 150%;
            background: radial-gradient(at bottom, #48668533, transparent, transparent);
            z-index: 1;
        }
        ul.infoGraphic li .content {
            margin: 8em 3em 1em 7em;
            position: relative;
        }
        ul.infoGraphic li .content h2 {
            font-size: 1.7em;
            font-weight: 500;
            text-align: center;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        ul.infoGraphic li .content p {
            line-height: 1.5em;
        }

        ul.infoGraphic li:hover .coverWrap .numberCover {
            border-radius: 100%;
        }

        .icon {
            position: absolute;
            font-size: 2rem;
            text-align: center;
            top: -1.3em;
            left: 50%;
            transform: translatex(-50%);
        }
        .icon:before {
            color: #666;
            font-family: FontAwesome;
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
        }

        .iconCodepen:before {
            content: "";
        }

        .iconSocial:before {
            content: "";
        }

        .iconAirplane:before {
            content: "";
        }

        .iconMap:before {
            content: "";
        }

        .iconBulb:before {
            content: "";
        }

        .iconPeace:before {
            content: "";
        }

        html {
            height: 100%;
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: var(--bg1);
            min-height: 100vh;
            color: #444;
            display: grid;
            place-items: center;
            padding: 3rem 1rem 10em;
        }

        .controls {
            position: fixed;
            z-index: 2;
            bottom: 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            background: #d7d7d7a1;
            padding: 0.5rem 2em;
            border-top-right-radius: 1rem;
            border-top-left-radius: 1rem;
            border: 1px solid #0000004d;
        }

        .sliderBox {
            text-align: center;
        }
        .sliderBox .range-value {
            font-weight: 500;
            font-size: 22px;
        }

        input[type=range] {
            width: 100%;
            margin: 1em 0;
            -webkit-appearance: none;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]::-webkit-slider-runnable-track {
            background: #00000066;
            border: 0;
            border-radius: 1.3px;
            width: 100%;
            height: 2px;
            cursor: pointer;
        }

        input[type=range]::-webkit-slider-thumb {
            margin-top: -10px;
            width: 20px;
            height: 20px;
            background: #eee;
            box-shadow: inset 0px 1px 1px #ffffff66, 0px 1px 3px black;
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: 50px;
            cursor: pointer;
            -webkit-appearance: none;
        }

        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #eee;
        }

        input[type=range]::-moz-range-track {
            background: #000;
            border: 0;
            border-radius: 1.3px;
            width: 100%;
            height: 1px;
            cursor: pointer;
        }

        input[type=range]::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #151728;
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: 50px;
            cursor: pointer;
        }

        input[type=range]::-ms-track {
            background: transparent;
            border-color: transparent;
            border-width: 13px 0;
            color: transparent;
            width: 100%;
            height: 1px;
            cursor: pointer;
        }

        input[type=range]::-ms-fill-lower {
            background: #151728;
            border: 0;
            border-radius: 2.6px;
        }

        input[type=range]::-ms-fill-upper {
            background: #151728;
            border: 0;
            border-radius: 2.6px;
        }

        input[type=range]::-ms-thumb {
            width: 25px;
            height: 25px;
            background: #151728;
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: 50px;
            cursor: pointer;
            margin-top: 0px;
            /*Needed to keep the Edge thumb centred*/
        }

        input[type=range]:focus::-ms-fill-lower {
            background: #ffffff;
        }

        input[type=range]:focus::-ms-fill-upper {
            background: #ffffff;
        }
        .title {
            font-family: Arial, sans-serif;
            font-size: 30px;
            color: #333;
            text-align: center;
            margin-top: 50px;
            font-weight: bold;
        }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->
<main>
    <h2 class="title">

        <?php
        echo html_entity_decode(__('content.Comment devenir Représentant ZENGYM ?'));
        ?>
    </h2>
    <ul class="infoGraphic">
        <li>
            <div class="numberWrap">
                <div class="number fontColor1">1</div>
                <div class="coverWrap">
                    <div class="numberCover"></div>
                </div>
            </div>
            <div class="content">
                <div class="icon">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('icons/Capture8.png')}}" style="width: 40px">
                </div>
                <h2>
                    <?php
                    echo html_entity_decode(__('content.Faire acte'));
                    ?>
                </h2>
                <p>
                    <?php
                    echo html_entity_decode(__('content.Faire acte de candidature'));
                    ?>
                </p>
            </div>
        </li>
        <li>
            <div class="numberWrap">
                <div class="number fontColor2">2</div>
                <div class="coverWrap">
                    <div class="numberCover"></div>
                </div>
            </div>
            <div class="content">
                <div class="icon">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('icons/Capture9.png')}}" style="width: 50px">
                </div>
                <h2>
                    <?php
                    echo html_entity_decode(__('content.Signer un contrat'));
                    ?>
                </h2>
                <p>
                    <?php
                    echo html_entity_decode(__('content.Signer un contrat de représentation'));
                    ?>
                </p>
            </div>
        </li>
        <li>
            <div class="numberWrap">
                <div class="number  fontColor3">3</div>
                <div class="coverWrap">
                    <div class="numberCover"></div>
                </div>
            </div>
            <div class="content">
                <div class="icon">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('icons/Capture10.png')}}" style="width: 40px">
                </div>
                <h2>
                    <?php
                    echo html_entity_decode(__('content.Recevoir la formation'));
                    ?>
                </h2>
                <p>
                    <?php
                    echo html_entity_decode(__('content.Recevoir la formation initiale'));
                    ?>
                </p>
            </div>
        </li>
        <li>
            <div class="numberWrap">
                <div class="number  fontColor4">4</div>
                <div class="coverWrap">
                    <div class="numberCover"></div>
                </div>
            </div>
            <div class="content">
                <div class="icon">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('icons/Capture11.png')}}" style="width: 45px">
                </div>
                <h2>
                    <?php
                    echo html_entity_decode(__('content.Développer des relations'));
                    ?>
                </h2>
                <p>
                    <?php
                    echo html_entity_decode(__('content.Développer des relations commerciales'));
                    ?>
                </p>
            </div>
        </li>
        <li>
            <div class="numberWrap">
                <div class="number  fontColor5">5</div>
                <div class="coverWrap">
                    <div class="numberCover"></div>
                </div>
            </div>
            <div class="content">
                <div class="icon">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('icons/Capture12.png')}}" style="width: 40px">
                </div>
                <h2>
                    <?php
                    echo html_entity_decode(__('content.Service après-vente'));
                    ?>
                </h2>
                <p>
                    <?php
                    echo html_entity_decode(__('content.Assurer le service après-vente'));
                    ?>
                </p>
            </div>
        </li>
        <!--     <li>
          <div class="numberWrap">
          <div class="number  fontColor6">6</div>
          <div class="coverWrap">
            <div class="numberCover"></div>
          </div>
            </div>
          <div class="content">
            <div class="icon iconPeace"></div>
            <h2>Succeed</h2>
            <p>Sagittis, audantium sem eveniet lacus pede porttitor aenean.</p>
          </div>
        </li> -->
    </ul>

</main>
<div class="controls">
    <div class="sliderBox">
        <img src="{{\Illuminate\Support\Facades\URL::asset('images/image15.png')}}" style="width: 50%">
    </div>
</div>
{{--<div class="controls">--}}
{{--    <div class="sliderBox">--}}
{{--        <input id="range" type="range" name="font-size" min=".6" max="1.5" value="1" step=".1" data-units="rem" />--}}
{{--        <div>--}}
{{--            Échelle en rems: <span class="range-value"></span></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script>
    ///////////////////////////////////////////
    // Resizing Slider

    const inputs = document.querySelectorAll("input");
    const div = document.querySelector("li");

    function handleInputChange() {
        const units = this.dataset.units || "";

        document.documentElement.style.setProperty(
            `--${this.name}`,
            this.value + units
        );
    }

    inputs.forEach((input) => input.addEventListener("input", handleInputChange));
    var range = $("input#range"),
        value = $(".range-value");
    value.html(range.attr("value"));
    range.on("input", function () {
        value.html(this.value);
    });
</script>

</body>
</html>
