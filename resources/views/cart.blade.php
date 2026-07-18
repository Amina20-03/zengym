@extends('layouts.app_vitrine')

@section('content')

    <style>

        .cart-page {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .cart-details {
            flex: 2;
            margin-right: 20px;
        }

        .cart-details h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        .quantity-form {
            display: flex;
            align-items: center;
        }

        .quantity-button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .quantity {
            width: 100px;
            text-align: center;
            border: 1px solid #ccc;
            margin: 0 5px;
            padding: 5px;
        }

        .remove-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .remove-button:hover {
            background-color: #e60000;
        }

        .cart-summary {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-summary h2 {
            margin-bottom: 10px;
        }

        .coupon-form {
            display: flex;
            margin-bottom: 20px;
        }

        .coupon-form input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }

        .coupon-form button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
        }

        .coupon-form button:hover {
            background-color: #0056b3;
        }

        .cart-summary p {
            margin: 10px 0;
        }

        .cart-summary h3 {
            margin: 20px 0;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-button:hover {
            background-color: #218838;
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
            <!-- partial:index.partial.html -->
            <div class="row">
                @if (Session::has('success'))

                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <div class="col-xl-8">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h4>{{ count($cartItems) }} article(s)</h4>
                        @if(count($cartItems)>0)
                            <a href="{{route('shop')}}" class="btn btn-success">{{ __('content.Continuer mes achats') }}</a>
                        @endif
                    </div>

                    <!-- {{$total = 0}} -->
                    @if (session('user_id'))
                        <div class="card-datatable table-responsive">
                            <table
                                    class="datatables-users table border-top"
                                    id="table"
                                    style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>{{ __('content.produits') }}</th>
                                    <th>{{ __('content.prix_vente_ttc') }}</th>
                                    <th>{{ __('content.qte') }}</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartItems as $item)
                                    <!-- {{$total = $total + (floatval($item['product']['prix_vente_ttc']) * intval($item['quantity']))}} -->
                                    <tr>
                                        <td hidden>{{ $item['product']['id'] }}</td>
                                        <td>{{ $item['product']['desc'] }}</td>
                                        <td>{{ $item['product']['prix_vente_ttc'] }} DT</td>
                                        <td>
                                            <input type="text" class="quantity" data-price="{{ $item['price'] }}" value="{{ $item['quantity'] }}" data-id="{{ $item['product']['id'] }}" onkeyup="modifier_prix_qte(this)" oninput="validateNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="quantity" id="prix_qte" value="{{ floatval($item['product']['prix_vente_ttc']) * intval($item['quantity']) }}">
                                        </td>
                                        <td>
                                            <form action="{{route('shop.produit.cart_destroy',$item['product']['id'])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="remove-button" type="submit">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-datatable table-responsive">
                            <table class="datatables-users table border-top" id="table" style="white-space: nowrap;">
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>{{ __('content.produits') }}</th>
                                    <th>{{ __('content.prix_vente_ttc') }}</th>
                                    <th>{{ __('content.qte') }}</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td hidden>{{ $item['product_id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['price'] }} DT</td>
                                        <td>
                                            <input type="text" class="quantity" data-price="{{ $item['price'] }}" value="{{ $item['quantity'] }}" data-id="{{ $item['product_id'] }}" onkeyup="modifier_prix_qte(this)" oninput="validateNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="total-price" value="{{ floatval($item['price']) * intval($item['quantity']) }}">
                                        </td>
                                        <td style="width: 50px">
                                            <form action="{{ route('shop.produit.cart_destroy', $item['product_id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="remove-button" type="submit">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    @endif
                </div>
                <div class="col-xl-4">
                    <div class="nav-align-top mb-6">
                        <ul class="nav nav-pills mb-4" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">{{ __('content.connexion') }}</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">{{ __('content.Inscription') }}</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                                <p>
                                <form action="{{route('shop.produit.cart.connexion')}}" method="post" class="row g-3">
                                    @csrf
                                    <input type="text" id="email"
                                           name="emaill"
                                           placeholder="Entrer votre login"
                                           class="form-control"
                                           autofocus>
                                    <br>
                                    <input type="password"  id="password"
                                           class="form-control"
                                           name="password"
                                           placeholder="****">
                                    <br>

                                    <input type="hidden"  id="prix"
                                           class="form-control"
                                           name="prix"
                                           value="{{$total}}"
                                           >
                                    <button type="submit" class="btn btn-primary d-grid w-100">{{ __('content.se_connecter') }}</button>
                                </form>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                <form method="POST" enctype="multipart/form-data" id="formaddmois2" action="{{route('shop.produit.cart.inscription')}}" class="row g-3">
                                    @csrf
                                    <div class="col-12 col-md-6">
                                        <label
                                                class="form-label"
                                                for="nom"
                                        >{{ __('content.nom') }}</label
                                        >
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="nom"
                                                placeholder="{{ __('content.nom') }}"
                                                name="nom"
                                                aria-label="{{ __('content.nom') }}"
                                                required
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label
                                                class="form-label"
                                                for="prenom"
                                        >{{ __('content.prenom') }}</label
                                        >
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="prenom"
                                                placeholder="{{ __('content.prenom') }}"
                                                name="prenom"
                                                aria-label="{{ __('content.prenom') }}"

                                        />
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label
                                                class="form-label"
                                                for="mail"
                                        >{{ __('content.mail') }}</label
                                        >
                                        <input
                                                type="email"
                                                class="form-control"
                                                id="mail"
                                                placeholder="{{ __('content.mail') }}"
                                                name="mail"
                                                aria-label="{{ __('content.mail') }}"
                                                required
                                        />
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label
                                                class="form-label"
                                                for="adresse"
                                        >{{ __('content.adresse') }}</label
                                        >
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="adresse"
                                                placeholder="{{ __('content.adresse') }}"
                                                name="adresse"
                                                aria-label="{{ __('content.adresse') }}"
                                                required
                                        />
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label
                                                class="form-label"
                                                for="tel"
                                        >{{ __('content.tel') }}</label
                                        >
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="tel"
                                                placeholder="{{ __('content.tel') }}"
                                                name="tel"
                                                aria-label="{{ __('content.tel') }}"
                                                required

                                        />
                                    </div>
                                    <button
                                            type="submit"
                                            class="btn btn-primary me-sm-3 me-1 data-submit"
                                            id="submitButton"
                                    >
                                        {{ __('content.Valider') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- partial -->
        </div>
    </section>
    <!-- Popular Articles: End -->
    <script>
        function modifier_prix_qte(inputElement) {
            // Get the quantity input element's value
            var quantity = parseInt(inputElement.value);

            // Get the price associated with the product from the data attribute
            var price = parseFloat(inputElement.getAttribute('data-price'));

            // Calculate the total price
            var totalPrice = price * quantity;

            // Update the total price input field in the same row
            var totalPriceElement = inputElement.closest('tr').querySelector('.total-price');
            totalPriceElement.value = totalPrice.toFixed(2);  // Format the total price to two decimal places
        }
        function validateNumber(inputElement) {
            // Allow only numbers and one decimal point
            inputElement.value = inputElement.value.replace(/[^0-9\.]/g, ''); // Remove non-numeric characters except for the decimal point

            // Ensure there is only one decimal point
            var decimalCount = (inputElement.value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                inputElement.value = inputElement.value.replace(/\.(?=.*\.)/, ''); // Remove extra decimal points
            }
        }
    </script>
@endsection
