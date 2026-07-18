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
    <title>Présentation interactive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: transparent;
           // margin: 0;
           // padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 100%;
            margin: auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .tabs {
            display: flex;
            background: #f5f5f5;
            justify-content: center;
            border-bottom: 2px solid #ddd;
        }

        .tab-button {
            flex: 1;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            color: #666;
            font-size: 18px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .tab-button i {
            font-size: 22px;
            margin-bottom: 5px;
            display: block;
        }

        .tab-button.active {
            color: #9b59b6;
            border-bottom: 3px solid #9b59b6;
            background-color: #fff;
        }

        .tab-content {
            display: none;
            padding: 30px;
            animation: fadeIn 0.4s ease-in-out;
        }

        .tab-content.active {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 30px;
        }

        .tab-content img {
            width: 300px;
            max-width: 100%;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .tab-text {
            flex: 1;
        }

        .tab-text h3 {
            color: #9b59b6;
            margin-bottom: 15px;
        }

        .tab-text p {
            line-height: 1.6;
            color: #333;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(10px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @media (max-width: 768px) {
            .tab-content {
                flex-direction: column;
                text-align: center;
            }

            .tab-content img {
                width: 100%;
            }

            .tab-button {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="tabs">
        <div class="tab-button active" data-tab="tab1"><i class="fas fa-brain"></i>
            <?php
            echo html_entity_decode(__('content.Science'));
            ?>
        </div>
        <div class="tab-button" data-tab="tab2"><i class="fas fa-person-walking"></i>
            <?php
            echo html_entity_decode(__('content.Autonomie'));
            ?>
        </div>
        <div class="tab-button" data-tab="tab3"><i class="fas fa-handshake-angle"></i>
            <?php
            echo html_entity_decode(__('content.Inclusion'));
            ?>
        </div>
    </div>

    <div class="tab-content active" id="tab1">
        <img src="https://maroc-diplomatique.net/wp-content/uploads/2021/02/intelligence-artificielle-big-data-digitalisation.jpg" alt="Science">
        <div class="tab-text">
            <h3>
                <?php
                echo html_entity_decode(__('content.Innovation fondée sur la science'));
                ?>
            </h3>
            <p>
                <?php
                echo html_entity_decode(__('content.Un concept novateur, validé par des recherches cliniques, créé par la Docteure Mouna Abrougui.'));
                ?>
            </p>
        </div>
    </div>

    <div class="tab-content" id="tab2">
        <img src="https://blog.teranga-software.com/hubfs/equipe_organisation_horaies_ehpad.jpg" alt="Autonomie">
        <div class="tab-text">
            <h3>
                <?php
                echo html_entity_decode(__('content.Prévention et autonomie'));
                ?>
            </h3>
            <p>
                <?php
                echo html_entity_decode(__('content.L’objectif est d’apprendre à mieux bouger, mieux respirer et mieux vivre, de manière autonome et durable.'));
                ?>
            </p>
        </div>
    </div>

    <div class="tab-content" id="tab3">
        <img src="https://www.latribunedelinitiative.fr/wp-content/uploads/2023/07/c-Igor-Alecsander-iStock.jpg" alt="Inclusion">
        <div class="tab-text">
            <h3>
                <?php
                echo html_entity_decode(__('content.Bienveillance et inclusion'));
                ?>
            </h3>
            <p>
                <?php
                echo html_entity_decode(__('content.Chaque séance est conçue pour respecter les limites de chacun, dans un esprit positif et motivant.'));
                ?>
            </p>
        </div>
    </div>
</div>

<script>
    const tabs = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            document.getElementById(tab.dataset.tab).classList.add('active');
        });
    });
</script>

</body>
</html>
