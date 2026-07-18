@extends('layouts.app_vitrine')

@section('content')
    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'blog','menuactive' =>''])

    <!-- Sections:Start -->
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt" style="
    background-image: url('https://img.freepik.com/photos-gratuite/groupe-femmes-travaillant_23-2148387782.jpg?t=st=1733738138~exp=1733741738~hmac=6cbf261d885e68df0716e8f9bfe1f40da7bc6f018635c9b123894425d5c36385&w=1380');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 10px -10px;
    ">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6" style="text-align: center;">
                            <h1 style="font-family: cursive;color: black">Biology of Sport </h1>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row g-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-6 gap-2">
                        <div class="me-1">

                            <br>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">Biology of Sport</span>
                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">
                        <div class="p-2">
                            <div class="cursor-pointer" style="text-align: center">
                                <img class="img-fluid" src="https://www.termedia.pl/f/covers/mag78.jpg?p=4sa" alt="Le Blob" style="width: 220px"/>
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <strong class="mb-0" style="text-align: justify">
                                <?php
                                echo html_entity_decode(__('content.Twenty-four weeks of combined exercise training prevents metabolic syndrome progression in adult women: evidence from a randomized controlled trial'));
                                ?>
                            </strong>
                            <p class="mb-0" style="text-align: justify">
                                Mouna Abrougui
                                1
                                ,

                                Refka Hassine
                                2
                                ,

                                Monia Zaouali
                                1
                                ,

                                Asma Ben Abdelaziz
                                2
                                ,

                                Asma Omezzine
                                2
                                ,

                                Meriam Denguezli
                                1, 3
                            </p>
                            <p class="mb-0" style="text-align: justify">
                                <br>
                                1. Department of Basic Sciences, LR19ES09, Faculty of Medicine of Sousse, University of Sousse, Sousse, Tunisia<br>
                                2. Department of Biochemistry, LR12SP11, Sahloul University Hospital, Sousse Tunisia. Faculty of pharmacy of Monastir, University of Monastir, Monastir, Tunisia<br>
                                3. Department of Basic and Mixed Sciences, Faculty of Dental Medicine, University of Monastir, Monastir, Tunisia<br>
                            </p>
                            <strong>
                                PlumX Metrics
                            </strong>
                            <p class="mb-0" style="text-align: justify">
                                <br>
                                1. Han TS, Lean ME. A clinical perspective of obesity, metabolic syndrome and cardiovascular disease. JRSM Cardiovasc Dis. 2016; 25; 5:2048004016633371.
                                <br><br>2. Newsome ANM, Reed R, Sansone J, Batrakoulis A, Mcavoy C, Parrott MW. 2024 ACSM worldwide fitness trends future directions of the health and fitness industry. ACSM’s Health Fitness J. 2024; 28(1):14–26.
                                <br><br>3. Kim KB, Kim K, Kim C, Kang SJ, Kim HJ, Yoon S, Shin YA. Effects of exercise on the body composition and lipid profile of individuals with obesity: A systematic review and meta-analysis. J Obes Metab Syndr. 2019; 28(4):278–294.
                                <br><br>4. Wewege MA, Thom JM, Rye K-A, Parmenter BJ. Aerobic, resistance or combined training: A systematic review and meta-analysis of exercise to reduce cardiovascular risk in adults with metabolic syndrome. Atherosclerosis. 2018; 274:162–171.
                                <br><br>5. Izquierdo M, Merchant RA, Morley JE, Anker SD, Aprahamian I, Arai H, Aubertin-Leheudre M, Bernabei R, Cadore EL, Cesari M, Chen LK, de Souto Barreto P, Duque G, Ferrucci L, Fielding RA, García-Hermoso A, Gutiérrez-Robledo LM, Harridge SDR, Kirk B, Kritchevsky S, Landi F, Lazarus N, Martin FC, Marzetti E, Pahor M, Ramírez-Vélez R, Rodriguez-Mañas L, Rolland Y, Ruiz JG, Theou O, Villareal DT, Waters DL, Won Won C, Woo J, Vellas B, Fiatarone Singh M. International exercise recommendations in older adults (ICFSR): Expert consensus guidelines. J Nutr Health Aging. 2021; 25:824–853.
                                <br><br>6. Farinha JB, Dos Santos DL, Bresciani G, Bard LF, de Mello F, Stefanello ST, Courtes AA, Soares F. Weight loss is not mandatory for exercise-induced effects on health indices in females with metabolic syndrome. Biol Sport. 2015 Jun; 32:109–114.
                                <br><br>7. Amare F, Alemu Y, Enichalew M, Demilie Y, Adamu S. Effects of aerobic, resistance, and combined exercise training on body fat and glucolipid metabolism in inactive middle-aged adults with overweight or obesity: a randomized trial. BMC Sports Sci Med Rehabil. 2024 Sep 11; 16(1):189.
                                <br><br>8. Brown RC. Nutrition for optimal performance during exercise: carbohydrate and fat. Curr Sports Med Rep. 2002; 1(4):222–229.
                                <br><br>9. Haskell WL, Lee IM, Pate RR, Powell KE, Blair SN, Franklin BA, Macera CA, Heath GW, Thompson PD, Bauman A. Physical activity and public health: updated recommendation for adults from the American College of Sports Medicine and the American Heart Association. Med Sci Sports Exerc. 2007; 39:1423–1434.
                                <br><br>10. Schoenfeld BJ. Potential mechanisms for a role of metabolic stress in hypertrophic adaptations to resistance training. Sports Med. 2013; 43:179–194.
                                <br><br>11. Khalid K, Szewczyk A, Kiszałkiewicz J, Migdalska-Sęk M, Domańska-Senderowska D, Brzeziański M, Lulińska E, Jegier A, Brzeziańska-Lasota E. Type of training has a significant influence on the GH/ IGF-1 axis but not on regulating miRNAs. Biol Sport. 2020; 37:217–228.
                                <br><br>12. Wang T, Yang L, Xu Q, Dou J, Clemente FM. Effects of recreational team sports on the metabolic health, body composition and physical fitness parameters of overweight and obese populations: A systematic review. Biol Sport. 2024; 41:243–266.
                                <br><br>13. Al-Mhanna SB, Rocha-Rodriguesc S, Mohamed M, Batrakoulis A, Aldhahi MI, Afolabi HA, Yagin FH, Alhussain MH, Gülü M, Abubakar BD, Ghazali WSW, Alghannam AF, Badicu G. Effects of combined aerobic exercise and diet on cardiometabolic health in patients with obesity and type 2 diabetes: a systematic review and meta-analysis. BMC Sports Sci Med Rehabil. 2023; 15:165.
                                <br><br>14. Colberg SR, Sigal RJ, Yardley JE, Riddell MC, Dunstan DW, Dempsey PC, Horton ES, Castorino K, Tate DF. Physical activity/exercise and diabetes: a position statement of the American Diabetes Association. Diabetes Care. 2016; 39(11):2065–2079.
                                <br><br>15. Vanhees L, Geladas N, Hansen D, Kouidi E, Niebauer J, Reiner Z, Cornelissen V, Adamopoulos S, Prescott E, Börjesson M, Bjarnason-Wehrens B, Björnstad HH, Cohen-Solal A, Conraads V, Corrado D, De Sutter J, Doherty P, Doyle F, Dugmore D, Ellingsen Ø, Fagard R, Giada F, Gielen S, Hager A, Halle M, Heidbüchel H, Jegier A, Mazic S, McGee H, Mellwig KP, Mendes M, Mezzani A, Pattyn N, Pelliccia A, Piepoli M, Rauch B, Schmidt-Trucksäss A, Takken T, van Buuren F, Vanuzzo D. Importance of characteristics and modalities of physical activity and exercise in the management of cardiovascular health in individuals with cardiovascular risk factors: recommendations from the EACPR (Part II). Eur J Prev Cardiol. 2011; 19:1005–1033.
                                <br><br>16. American College of Sports Medicine. Policy statement regarding the use of human subjects and informed consent. Med Sci Sports Exerc. 1999 Nov; 31(11):1–2.
                                <br><br>17. Warburton DE, Jamnik V, Bredin SS, Shephard RJ, Gledhill N. The 2019 physical activity readiness questionnaire for everyone (PAR-Q+) and electronic physical activity readiness medical examination (ePARmed-X+). Health Fitness J Can. 2018; 11:80–83.
                                <br><br>18. Alberti KG, Eckel RH, Grundy SM, Zimmet PZ, Cleeman JI, Donato KA, Fruchart JC, James WPT, Loria CM, Smith SC Jr. Harmonizing the metabolic syndrome: A joint interim statement of the International Diabetes Federation Task Force on Epidemiology and Prevention; National Heart, Lung, and Blood Institute; American Heart Association; World Heart Federation; International Atherosclerosis Society; and International Association for the Study of Obesity. Circulation. 2009 Oct; 120(16):1640–5.
                                <br><br>19. Santoro NM, Tadashi KH, Burini RC. Metabolic syndrome response to different physical-exercise protocols. Am J Sports Sci. 2019; 7:182–192.
                                <br><br>20. Matthews DR, Hosker JP, Rudenski AS, Naylor BA, Treacher DF, Turner RC. Homeostasis model assessment: insulin resistance and beta-cell function from fasting plasma glucose and insulin concentrations in man. Diabetologia. 1985; 28(7):412–419.
                                <br><br>21. Rikli RE, Jones CJ. Development and validation of a functional fitness test for community-residing older adults. J Aging Phys Act. 1999; 7:129–161.
                                <br><br>22. Pedrero-Chamizo R, Gómez-Cabello A, Delgado S, Roderiguez-Llarena S, Roderiguez-Marroyo JA, Cabanillas E. Physical fitness levels among independent non-institutionalized Spanish elderly: The elderly EXERNET multi-center study. Arch. Gerontol. Geriatr. 2012; 55:406–416.
                                <br><br>23. Thompson PD, Arena R, Riebe D, Pescatello LS. ACSM’s new preparticipation health screening recommendations from ACSM’s guidelines for exercise testing and prescription. Curr Sport Med Rep. 2013; 12:215–217.
                                <br><br>24. Leveritt M, Abernethy PJ, Barry BK, Logan PA. Concurrent strength and endurance training. Sport Med. 1999; 28:413–427.
                                <br><br>25. Ahn N, Kim K. Dynamic resistance exercise alters blood ApoA-I levels, inflammatory markers, and metabolic syndrome markers in elderly women. Healthcare (Basel). 2022; 10:1982.
                                <br><br>26. Richardson JTE. Eta squared and partial eta squared as measures of effect size in educational research. Educ Res Rev. 2011; 6:135–47.
                                <br><br>27. Seo DI, So WY, Ha S, Yoo EJ, Kim D, Singh H, Fahs CA, Rossow L, Bemben DA, Bemben MG, Kim E. Effects of 12 weeks of combined exercise training on Visfatin and metabolic syndrome factors in obese middle-aged women. J Sports Sci Med. 2011; 10:222–226.
                                <br><br>28. Villareal DT, Apovian CM, Kushner RF, Klein S. Obesity in older adults: technical review and position statement of the American Society for Nutrition and NAASO, The Obesity Society. Obes Res. 2005; 13(11):1849–1863.
                                <br><br>29. Elia M. Obesity in the elderly. Obes Res. 2001; 9:244S-248S.
                                <br><br>30. Philipsen A, Jørgensen ME, Vistisen D, Sandbaek A, Almdal TP, Christiansen JS, Lauritzen T, Witte DR. Associations between ultrasound measures of abdominal fat distribution and indices of glucose metabolism in a population at high risk of type 2 diabetes: the ADDITION-PRO study. PLoS One. 2015; 10:e0123062.
                                <br><br>31. Sarafidis PA, Bakris GL. Protection of the kidney by Thiazolidinediones: an assessment from bench to bedside. Kidney Int. 2006; 70:1223–1233.
                                <br><br>32. Hersey WC 3rd, Graves JE, Pollock ML, Gingerich R, Shireman RB, Heath GW, Spierto F, McCole SD, Hagberg JM. Endurance exercise training improves body composition and plasma insulin responses in 70- to 79-year-old men and women. Metabolism. 1994; 43:847–854.
                                <br><br>33. Park W, Jung WS, Hong K, Kim YY, Kim SW, Park HY. Effects of moderate combined resistance- and aerobic-exercise for 12 weeks on body composition, cardiometabolic risk factors, blood pressure, arterial stiffness, and physical functions, among obese older men: A pilot study. Int J Environ Res Public Health. 2020; 17:7233.
                                <br><br>34. Ha CH, So WY. Effects of combined exercise training on body composition and metabolic syndrome factors. Iran J Public Health. 2012; 41:20–26.
                                <br><br>35. Kraus WE, Houmard JA, Duscha BD, Knetzger KJ, Wharton MB, McCartney JS, Bales CW, Henes S, Samsa GP, Otvos JD, Kulkarni KR, Slentz CA. Effects of the amount and intensity of exercise on plasma lipoproteins. N Engl J Med. 2002 Nov 7; 347(19):1483–1492.
                                <br><br>36. Magalhães JP, Santos DA, Correia IR, Hetherington-Rauth M, Ribeiro R, Raposo JF, Matos A, Bicho MD, Sardinha LB. Impact of combined training with different exercise intensities on inflammatory and lipid markers in type 2 diabetes: a secondary analysis from a 1-year randomized controlled trial. Cardiovasc Diabetol. 2020; 7; 19:169.
                                <br><br>37. Zhou J, Qin G. Adipocyte dysfunction and hypertension. Am J Cardiovasc Dis. 2012; 2(2):143–149.
                                <br><br>38. Ostman C, Smart NA, Morcos D, Duller A, Ridley W, Jewiss D. The effect of exercise training on clinical outcomes in patients with the metabolic syndrome: a systematic review and meta-analysis. Cardiovasc Diabetol. 2017; 30:110.
                                <br><br>39. Xu QI, Silva RM, Zmijewski P, Li TY, Ma D, Yang LX, Liu GY, Clemente FM. Recreational soccer and basketball improve anthropometric, body composition and health-related outcomes in overweight and obese young adults: A randomized multi-arm study. Biol Sport. 2025; 42(2):21–33.
                                <br><br>40. Souissi A, Dergaa I, Hajri SE, Chamari K, Ben Saad H. A new perspective on cardiovascular function and dysfunction during endurance exercise: identifying the primary cause of cardiovascular risk. Biol Sport. 2024; 41(4):131–144.
                            </p>
                            <hr class="my-6">
                            <h5>
                                <p class="mb-0" style="text-align: justify">
                                    <?php
                                    echo html_entity_decode(__('content.Pour consulter l’article complet, vous pouvez visiter le lien suivant :'));
                                    ?>
                                </p>
                            </h5>
                            <div class="d-flex flex-wrap row-gap-2">
                                <div class="me-12">
                                    <p class="text-nowrap mb-2">
                                        <a href="https://www.termedia.pl/Twenty-four-weeks-of-combined-exercise-training-prevents-r-nmetabolic-syndrome-progression-in-adult-women-evidence-from-r-na-randomized-controlled-trial,78,56518,1,1.html">
                                            <?php
                                            echo html_entity_decode(__('content.Cliquer sur ce lien'));
                                            ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <hr class="my-6">
                            <h5>
                                <?php
                                echo html_entity_decode(__('content.Article ajoutée par'));
                                ?>
                            </h5>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-4">
                                        <img src="https://cdn-icons-png.flaticon.com/512/33/33308.png" alt="Avatar" class="rounded-circle">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1">ZENGYM HEALTH</h6>
                                    <small>ZENGYM TEAM</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
