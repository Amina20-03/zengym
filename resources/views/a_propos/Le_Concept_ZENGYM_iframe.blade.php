<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZenGym® - Concept Chic</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            color: #333;
        }

        .section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
            max-width: 1200px;
            margin: auto;
        }

        .text {
            flex: 1;
            padding-right: 30px;
        }

        .text h2 {
            font-size: 36px;
            color: #9b59b6;
            margin-bottom: 20px;
        }

        .text p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .benefits {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .benefit {
            display: flex;
            align-items: flex-start;
            background: #fff;
            border-left: 5px solid #9b59b6;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .benefit:hover {
            transform: translateY(-5px);
        }

        .benefit i {
            font-size: 24px;
            color: #9b59b6;
            margin-right: 15px;
        }

        .image {
            flex: 1;
            text-align: right;
        }
        .image2 {
            flex: 1;
            text-align: left;
        }

        .image img {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeInRight 1.5s ease;
        }
        .image2 img {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeInRight 1.5s ease;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                padding: 30px;
            }

            .text {
                padding-right: 0;
            }

            .benefits {
                grid-template-columns: 1fr;
            }

            .image {
                text-align: center;
                margin-top: 30px;
            }
            .image2 {
                text-align: center;
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>

<section class="section">

    <div class="text">
        <h2 style="color:#9b59b6;">
            <?php
            echo html_entity_decode(__('content.Le Concept ZENGYMHEALTH'));
            ?>
        </h2>
        <p style="text-align: justify;font-size: 20px; color: black">
            <?php
            echo html_entity_decode(__('content.concept1'));
            ?>
        </p>
        <p style="text-align: justify;font-size: 20px; color: black">
            <?php
            echo html_entity_decode(__('content.concept2'));
            ?>
        </p>
        <p style="text-align: justify;font-size: 20px; color: black">
            <?php
            echo html_entity_decode(__('content.concept3'));
            ?>
        </p>

        <div class="benefits">
            <div class="benefit"><i class="fas fa-heartbeat"></i>
                <div>
                    <?php
                    echo html_entity_decode(__('content.avantage1'));
                    ?>
                </div>
            </div>
            <div class="benefit"><i class="fas fa-weight"></i>
                <div>
                    <?php
                    echo html_entity_decode(__('content.avantage2'));
                    ?>
                </div>
            </div>
            <div class="benefit"><i class="fas fa-tint"></i>
                <div>
                    <?php
                    echo html_entity_decode(__('content.avantage3'));
                    ?>
                </div>
            </div>
            <div class="benefit"><i class="fas fa-heart"></i>
                <div>
                    <?php
                    echo html_entity_decode(__('content.avantage4'));
                    ?>
                </div>
            </div>
            <div class="benefit"><i class="fas fa-heart"></i>
                <div>
                    <?php
                    echo html_entity_decode(__('content.avantage5'));
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="image">
        <img src="{{\Illuminate\Support\Facades\URL::asset('images/image18.jpg')}}" alt="ZenGym session" />
        <img src="{{\Illuminate\Support\Facades\URL::asset('images/image9.jpg')}}" alt="ZenGym session" />
    </div>
</section>
<section class="section">
    <div class="image2">
        <img src="{{\Illuminate\Support\Facades\URL::asset('images/image7.jpg')}}" alt="Bienfaits ZenGym" />
    </div>
    <div class="text">
        <h2 style="color:#9b59b6;">Bienfaits du ZenGym® sur le Syndrome Métabolique</h2>
        <p style="text-align: justify; font-size: 18px; color: black">
            <?php
            echo html_entity_decode(__('content.concept4'));
            ?>
        </p>
        <p style="text-align: justify; font-size: 18px; color: black">
            <?php
            echo html_entity_decode(__('content.concept5'));
            ?>
        </p>
    </div>
</section>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>

</body>
</html>
