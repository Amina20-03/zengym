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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pourquoi ZENGYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: transparent;
            color: #333;
            font-family: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;;
        }

        .formule-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .formule-item i {
            font-size: 22px;
            color: #9b59b6;
            margin-top: 4px;
        }

        .formule-item p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .section {
            display: flex;
            flex-wrap: wrap;
            max-width: 100%;

            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .image-side {
            flex: 1;
            background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/image9.jpg')}}');
            background-size: cover;
            background-position: center;
            min-height: 400px;
        }

        .content-side {
            flex: 1;
            padding: 40px;
        }

        h2 {
            font-size: 28px;
            color: #4e008e;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 20px;
            color: #666;
            margin-bottom: 30px;
        }

        .features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .feature {
            background: #f0efff;
            border-left: 5px solid #7a3bd8;
            padding: 15px 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 16px;
        }

        .feature i {
            font-size: 20px;
            color: #7a3bd8;
        }

        @media(max-width: 900px) {
            .section {
                flex-direction: column;
            }

            .image-side {
                min-height: 250px;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }

    </style>
</head>
<body>

<div class="section">

    <div class="content-side">

        <div class="formule-item">
            <i class="fas fa-sun"></i>
            <p>
                <?php
                echo html_entity_decode(__('content.<strong>Cours matinaux gratuits</strong> de 30 minutes (position debout), proposés aux résidents avant le petit-déjeuner.'));
                ?>
            </p>
        </div>

        <div class="formule-item">
            <i class="fas fa-dumbbell"></i>
            <p>
                <?php
                echo html_entity_decode(__('content.<strong>Séances en salle</strong> (ZENGYM Studio) l’après-midi ou en soirée pour des sessions complètes de 60 minutes.'));
                ?>
            </p>
        </div>

        <div class="formule-item">
            <i class="fas fa-users"></i>
            <p>
                <?php
                echo html_entity_decode(__('content.<strong>Workshops ZENGYM</strong>, séances de groupe ou coaching individuel sur demande.'));
                ?>
            </p>
        </div>
    </div>
    <div class="image-side"></div>
</div>

</body>
</html>
