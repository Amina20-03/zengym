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
    <title>Slogan ZenGym</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: transparent;
            background-size: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slogan-container {
            background-image: url('https://www.transparenttextures.com/patterns/white-diamond.png'); /* Motif chic */
            background-repeat: repeat;
            padding: 3rem 2rem;
            max-width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-left: 8px solid #9b59b6;
            border-radius: 16px;
            text-align: center;
            backdrop-filter: blur(4px);
            animation: fadeIn 1s ease;
        }

        .slogan-container h1 {
            color: #9b59b6;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .slogan-container p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #333;
        }

        .brand {
            font-size: 1.6rem;
            font-weight: bold;
            color: #9b59b6;
            margin-top: 1.5rem;
            letter-spacing: 1px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .slogan-container {
                padding: 2rem 1.5rem;
            }

            .slogan-container h1 {
                font-size: 1.5rem;
            }

            .slogan-container p {
                font-size: 1rem;
            }

            .brand {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

<div class="slogan-container">
    <h1>
        <?php
        echo html_entity_decode(__('content.Un concept unique, issu de la recherche tunisienne'));
        ?>
    </h1>
    <p>
        <?php
        echo html_entity_decode(__('content.about_us_2'));
        ?>
    </p>
    <div class="brand">ZenGym®</div>
</div>

</body>
</html>
