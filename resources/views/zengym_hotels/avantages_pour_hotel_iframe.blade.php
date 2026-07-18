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
    <title>Les Valeurs du ZENGYM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: transparent;
            color: #333;
        }

        .section {
            max-width: 100%;
            padding: 20px;
        }

        .section h2 {
            text-align: center;
            color: #4e008e;
            font-size: 32px;
            margin-bottom: 40px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            padding: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .card i {
            font-size: 30px;
            color: #9b59b6;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #7a3bd8;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .card p {
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .section h2 {
                font-size: 26px;
            }

            .card h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<div class="section">
    <div class="cards">
        <div class="card">
            <i class="fa-solid fa-face-smile"></i>
            <p>1.
                <?php
                echo html_entity_decode(__('content.Fidélisation et satisfaction client accrues'));
                ?>
            </p>
        </div>
        <div class="card">
            <i class="fas fa-universal-access"></i>
            <p>2.
                <?php
                echo html_entity_decode(__('content.Mise en valeur d’une offre bien-être
                exclusive'));
                ?>
            </p>
        </div>
        <div class="card">
            <i class="fa-solid fa-map-location"></i>
            <p>3.
                <?php
                echo html_entity_decode(__('content.ZENGYM s’adapte à tous les espaces :
                jardin, terrasse, salle de fitness, rooftop'));
                ?>
            </p>
        </div>
        <div class="card">
            <i class="fas fa-leaf"></i>
            <p>4.
                <?php
                echo html_entity_decode(__('content.Animation régulière sans logistique lourde'));
                ?>
            </p>
        </div>

    </div>
</div>

</body>
</html>
