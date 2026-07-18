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
                                            <input type="number" class="quantity" value="{{ $item['quantity'] }}">
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
                                    <!-- {{$total = $total + (floatval($item['price']) * intval($item['quantity']))}} -->
                                    <tr>
                                        <td hidden>{{ $item['product_id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['price'] }} DT</td>
                                        <td>
                                            <input type="number" class="quantity" value="{{ $item['quantity'] }}">
                                        </td>
                                        <td>
                                            <input type="text" readonly class="quantity" id="prix_qte" value="{{ floatval($item['price']) * intval($item['quantity']) }}">
                                        </td>
                                        <td style="width: 50px">
                                            <form action="{{route('shop.produit.cart_destroy',$item['product_id'])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="remove-button" type="submit">
                                                    X
                                                </button>
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
                    <div class="row">
                        <div
                                class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0"
                        >
                            <div class="card mb-12">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('shop.produit.cart.payer') }}" id="form-cmd" class="login100-form validate-form">
                                        @csrf
                                        <h4 class="cart-title">Informations Personnels</h4>
                                        <strong>Nom & Prénom</strong><br>
                                        {{session('nom')}}
                                        {{session('prenom')}}
                                        <br><br>
                                        <strong>Votre adresse</strong><br>
                                        {{session('adresse')}}
                                        <br><br>
                                        <strong>Prix Total</strong><br>
                                        {{$total}} DT
                                        <br><br>
                                        @if(session('candidat_id'))
                                            <strong>Code d'instructeur</strong><br>
                                            {{session('code_instr')}}
                                            <br><br>
                                        @endif

                                        <h4 class="cart-title">Paiement Par</h4>
{{--                                        <div class="form-check form-switch mb-2">--}}
{{--                                            <input class="form-check-input" type="radio" id="paiement_par" name="paiement_par" value="Chéque">--}}
{{--                                            <label class="form-check-label" for="flexSwitchCheckDefault">Chéque</label>--}}
{{--                                        </div>--}}
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="radio" id="paiement_par" name="paiement_par" value="Espèce">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Espèce</label>
                                        </div>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="radio" id="paiement_par" name="paiement_par" value="Konnect+" checked>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Konnect+</label>
                                        </div>
                                        <br>
                                        <input type="hidden" name="prix_total_input" value="{{$total}}">
                                        <input type="hidden" name="user_id_input" value="{{session('user_id')}}">
                                        <input type="hidden" name="nom_input" value="{{session('nom')}}">
                                        <input type="hidden" name="prenom_input" value="{{session('prenom')}}">
                                        <input type="hidden" name="tel_input" value="{{session('tel')}}">
                                        <input type="hidden" name="list_produits_id" id="list_produits_id">
                                        <input type="hidden" name="list_produits_desc" id="list_produits_desc">
                                        <input type="hidden" name="list_produits_prix" id="list_produits_prix">
                                        <input type="hidden" name="list_produits_qte" id="list_produits_qte">
                                        <input type="hidden" name="code_instr" id="code_instr" value="{{session('code_instr')}}??'0'">
                                        <div class="mb-6">
                                            <button
                                                    class="btn btn-primary d-grid w-100"
                                                    type="button"
                                                    onclick="payer()"
                                            >
                                                Payer
                                            </button>
                                        </div>
                                    </form>

                                </div>
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
        function payer(){
            // Reset the input fields
            $('#list_produits_id').val('');
            $('#list_produits_desc').val('');
            $('#list_produits_prix').val('');
            $('#list_produits_qte').val('');

            let table = document.getElementById("table");
            let rows = table.querySelectorAll("tbody tr");

            // Arrays to accumulate values from each column
            let produitsId = [];
            let produitsDesc = [];
            let produitsPrix = [];
            let produitsQte = [];

            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                let rowData = [];

                cells.forEach(cell => {
                    let input = cell.querySelector("input");
                    if (input) {
                        rowData.push(input.value); // Get the value from the input
                    } else {
                        rowData.push(cell.innerText.trim()); // Get the text content
                    }
                });

                console.log(rowData); // Logs the values of the current row

                // Assuming the structure of rowData is as follows:
                // rowData[0] -> produit id (or name)
                // rowData[1] -> produit description or price (depending on your table)
                // rowData[2] -> qte or the next value, etc.
                //
                // You must adjust these indices according to your actual table columns.

                // For demonstration, let's assume:
                // - rowData[0] is the produit name (or id),
                // - rowData[1] is the price,
                // - rowData[2] is the quantity,
                // - rowData[3] is the total.
                //
                // If you need to change it to match your actual logic, do so accordingly.

                produitsId.push(rowData[0]);
                produitsDesc.push(rowData[1]); // Change this if you have a separate description column
                produitsPrix.push(rowData[2]);
                produitsQte.push(rowData[3]);
            });

            // Now, set the concatenated values in the inputs (for example, as comma-separated strings)
            $('#list_produits_id').val(produitsId.join('|'));
            $('#list_produits_desc').val(produitsDesc.join('|'));
            $('#list_produits_prix').val(produitsPrix.join('|'));
            $('#list_produits_qte').val(produitsQte.join('|'));
            $('#form-cmd').submit();
        }

    </script>
@endsection
