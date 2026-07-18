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
    <meta charset="UTF-8" />
    <title>Collaboration proposée</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: transparent;

        }

        .section-container {
            display: flex;
            max-width: 100%;
            margin: auto;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .image-side {
            flex: 0 0 50%;
            background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/hotel.png')}}'); /* remplace avec chemin complet si besoin */
            background-size: cover;
            background-position: center;
            min-height: 400px;
        }

        .content-side {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .content-side h2 {
            font-size: 34px;
            margin-bottom: 20px;
            color: #9b59b6;
        }

        .content-side p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .content-side ul {
            padding-left: 20px;
            font-size: 16px;
            line-height: 1.8;
            color: #333;
        }

        .content-side ul li::marker {
            color: #9b59b6;
        }

        @media (max-width: 768px) {
            .section-container {
                flex-direction: column;
            }

            .image-side {
                flex: none;
                height: 300px;
            }

            .content-side {
                padding: 40px 20px;
            }

            .content-side h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

<div class="section-container">
    <div class="image-side"></div>
    <div class="content-side">
        <p>
            <?php
            echo html_entity_decode(__('content.Nous proposons :'));
            ?>
        </p>
        <ul>
            <li>
                <?php
                echo html_entity_decode(__('content.L’installation d’un ZENGYM Studio au sein de votre hôtel (branding, animation, planning régulier)'));
                ?>
            </li>
            <li>
                <?php
                echo html_entity_decode(__('content.Une formation du personnel pour l’encadrement des séances ZENGYM'));
                ?>
            </li>
            <li>
                <?php
                echo html_entity_decode(__('content.Une présence sur nos supports de communication et notre plateforme <strong>ZENGYMHEALTH</strong>'));
                ?>
            </li>
        </ul>
    </div>
</div>

</body>
</html>
