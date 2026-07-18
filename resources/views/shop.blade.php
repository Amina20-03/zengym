@extends('layouts.app_vitrine')

@section('content')
    <style>
        .product-image {
            width: 200px; /* Largeur fixe */
            height: 200px; /* Hauteur fixe */
            object-fit: cover; /* Ajuste l'image pour remplir sans déformation */
            border-radius: 10px; /* Coins arrondis optionnels */
        }
    </style>

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'acheter_prod','menuactive' =>''])

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
                            <h1 style="font-family: cursive;color: black">{{ __('content.acheter_prod') }} </h1>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Articles: Start -->
    <section class="section-py">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-xl-12">
                            <h6 class="text-muted">
                                <?php
                                echo html_entity_decode(__('content.categorie'));
                                ?>
                            </h6>
                            <div class="nav-align-left nav-tabs-shadow mb-6">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($list_cat as $cat)
                                        <li class="nav-item">
                                            <a href="{{ route('shop.by_categorie', $cat['id']) }}"
                                               class="nav-link {{ $id_cat == $cat['id'] ? 'active' : '' }}">
                                                {{$cat['lib']}}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-left-home">
                                        <p>
                                        <div class="row"> <!-- Ajout d'une row pour aligner les produits -->
                                            @foreach($liste as $prod)
                                                <div class="col-md-4 mb-4"> <!-- Chaque produit prend 4 colonnes -->
                                                    <div class="h-100">
                                                        <div class="card-body">
                                                            <div class="rounded-3 text-center mb-3 pt-4">
                                                                @if($prod['photo'])
                                                                    <img class="product-image" src="data:image/jpg;base64,{{$prod['photo']}}" alt="{{$prod['desc']}}" />
                                                                @else
                                                                    <img class="product-image" src="https://cdn-icons-png.freepik.com/512/2216/2216952.png" alt="{{$prod['desc']}}" />
                                                                @endif
                                                            </div>

                                                            <strong class="mb-2 pb-1">{{$prod['desc']}}</strong>
                                                            <p>{{$prod['prix_vente_ttc']}} DT</p>
                                                            <div class="col-12 text-center" style="text-align: center">
                                                                <table style="width: 100%">
                                                                    <thead>
                                                                    <tr style="text-align: center">
                                                                        <th style="text-align: center">
                                                                            <a href="{{route('shop.produit.details',$prod['id'])}}" class="btn btn-primary w-100 d-grid">
                                                                                <!--{{ __('content.Read More') }}-->
                                                                                <i class = "fa fa-eye"></i>
                                                                            </a>
                                                                        </th>
                                                                        <th style="text-align: center">
                                                                            <form action="{{route('shop.produit.cart_store',$prod['id'])}}" method="POST">
                                                                                @csrf
                                                                                <input type = "hidden" value = "1" name="quantity">
                                                                                <button type="submit" class = "btn btn-primary w-100 d-grid">
                                                                                    <input type = "hidden"  name="product_code" value="{{$prod['code']}}">
                                                                                    <input type = "hidden"  name="product_desc" value="{{$prod['desc']}}">
                                                                                    <input type = "hidden"  name="product_price" value="{{$prod['prix_vente_ttc']}}">
                                                                                    <!--{{ __('content.Ajouter au panier') }}-->
                                                                                    <i class = "fa fa-shopping-cart"></i>
                                                                                </button>
                                                                            </form>
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>

                                                            </div>
                                                            <div class="col-6 text-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div> <!-- Fin de la row -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Articles: End -->

    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">Contactez nous</span>
            </div>
            <h3 class="text-center mb-1"><span class="section-title">Travaillons</span> ensemble</h3>
            <p class="text-center mb-4 mb-lg-5 pb-md-3">Une question ou une remarque ? écris-nous simplement un message</p>
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="contact-img-box position-relative border p-2 h-100">
                        <img src="https://shoutem.com/wp-content/uploads/2020/11/Fitness_phoneperson@2x-496x489.png" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
                        <div class="pt-3 px-4 pb-1">
                            <div class="row gy-3 gx-md-4">
                                <div class="col-md-6 col-lg-12 col-xl-7">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                        <div>
                                            <p class="mb-0">Email</p>
                                            <h5 class="mb-0">
                                                <a href="mailto:contact@zengymhealth.com" class="text-heading">contact@zengymhealth.com</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-success rounded p-2 me-2">
                                            <i class="fa fa-phone bx-sm"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">Téléphone</p>
                                            <h5 class="mb-0"><a href="tel:+21655688828" class="text-heading">+216 55 688 828</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-1">Envoyer un message</h4>
                            <p class="mb-4">
                                <br>
                                <br>
                            </p>
                            <form>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="contact-form-fullname">Nom & Prénom</label>
                                        <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contact-form-email">Email</label>
                                        <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="contact-form-message">Message</label>
                                        <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            <p class="mb-4">
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us: End -->


@endsection
