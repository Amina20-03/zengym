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
            background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/image8.jpg')}}');
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
    <div class="image-side"></div>
    <div class="content-side">
        <h3>
            <?php
            echo html_entity_decode(__('content.L’intégration du concept ZENGYM dans les hôtels offre une valeur ajoutée différenciante pour les clients :'));
            ?>
        </h3>

        <div class="features">
            <div class="feature"><i class="fas fa-spa"></i>
                <?php
                echo html_entity_decode(__('content.Activité bien-être innovante dès le matin'));
                ?>
            </div>
            <div class="feature"><i class="fas fa-users"></i>
                <?php
                echo html_entity_decode(__('content.Convient à toutes les tranches d’âge'));
                ?>
            </div>
            <div class="feature"><i class="fas fa-tools"></i>
                <?php
                echo html_entity_decode(__('content.Aucune infrastructure complexe requise'));
                ?>
            </div>
            <div class="feature"><i class="fas fa-star"></i>
                <?php
                echo html_entity_decode(__('content.Améliore l’expérience client'));
                ?>
            </div>
            <div class="feature"><i class="fas fa-leaf"></i>
                <?php
                echo html_entity_decode(__('content.Renforce l’image de marque orientée santé & détente'));
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
