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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ZenGym Présentation</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: transparent;
            color: #333;

        }

        .container {
            display: flex;
            flex-wrap: wrap;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 100%;
            margin: auto;
        }

        .image-side {
            flex: 1 1 300px;
            min-height: 300px;
            background: url('{{\Illuminate\Support\Facades\URL::asset('images/image16.jpg')}}') center/cover no-repeat;
        }

        .content {
            flex: 2 1 500px;
            padding: 2rem;
        }

        .content h1 {
            color: #9b59b6;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .highlight {
            font-weight: bold;
            color: #444;
        }

        .section-title {
            margin-top: 2rem;
            font-size: 1.5rem;
            color: #222;
            border-left: 5px solid #9b59b6;
            padding-left: 0.75rem;
        }

        ul.features {
            list-style: none;
            padding-left: 0;
            margin-top: 1rem;
        }

        ul.features li {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
        }

        ul.features li::before {
            content: "✔";
            color: #9b59b6;
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }

        .mission {
            background-color: #f8f4fc;
            padding: 1rem;
            border-left: 4px solid #9b59b6;
            margin-top: 2rem;
            border-radius: 8px;
        }

        .mission h3 {
            color: #9b59b6;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .image-side {
                height: 250px;
            }

            .content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="image-side"></div>
    <div class="content">
        <h1>ZenGym® – Une approche innovante et scientifique</h1>
        <p>
            <?php
            echo html_entity_decode(__('content.about_us_3'));
            ?>
        </p>

        <h2 class="section-title">
            <?php
            echo html_entity_decode(__('content.Pourquoi ZENGYMHEALTH ?'));
            ?>
        </h2>
        <ul class="features">
            <li><strong>{{ __('content.Approche Scientifique :') }}</strong> {{ __('content.Des résultats mesurables et validés.') }}</li>
            <li><strong>{{ __('content.Accessibilité Totale :') }}</strong> {{ __('content.En ligne ou sur site, adapté à tous les niveaux.') }}</li>
            <li><strong>{{ __('content.Communauté Engagée :') }}</strong> {{ __('content.Soutien continu pour les adhérents et professionnels.') }}</li>
        </ul>

        <div class="mission">
            <h3>🎯 {{ __('content.Mission :') }}</h3>
            <p>
                {{ __('content.Offrir une solution accessible à tous pour améliorer leur qualité de vie.') }}<br>
                {{ __('content.Former et accompagner les professionnels du sport santé.') }}
            </p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>

</body>
</html>
