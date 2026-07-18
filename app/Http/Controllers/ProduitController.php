<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProduitController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'shop/produits');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            $cartItems = session('cart', []);
            return view('cart',compact('cartItems'));
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_cat = $data['list_cat'];
                    $id_cat = $data['id_cat'];
                }
                return view('shop',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                        'id_cat' => $id_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function produit_by_categ($id_categ){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'shop/produits/by_categ/'.$id_categ);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            $cartItems = session('cart', []);
            return view('cart',compact('cartItems'));
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_cat = $data['list_cat'];
                    $id_cat = $data['id_cat'];
                }
                return view('shop',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                        'id_cat' => $id_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function detail_produit($id_prod){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'shop/produits/detail/'.$id_prod);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            $cartItems = session('cart', []);
            return view('cart',compact('cartItems'));
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['liste'];
                }
                return view('product_detail',
                    [
                        'detail' => $detail,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function cart_store(Request $request, $product_id){
        $id_user = $product_id;
        if (session('user_id')) {
            $id_user = session('user_id');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type' => 'application/json',
            ])->post(env('API_URL').'shop/produits/add-to-card/'.$product_id, [
                'user_id' => session('user_id'),
                'quantity' => $request->quantity,
            ]);

            $data = $response->json();
//                                        dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
            if($data['message']=='Unauthenticated.'){
                $cartItems = session('cart', []);
                return view('cart',compact('cartItems'));
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }

                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        } else {
            // Utilisateur non connecté : ajouter au panier dans la session
            $cart = session('cart', []);

            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += $request->quantity;
            } else {
                $cart[$product_id] = [
                    'product_id' => $product_id,
                    'code' => $request->product_code,
                    'name' => $request->product_desc,
                    'price' => $request->product_price,
                    'quantity' => $request->quantity,
                ];
            }

            session(['cart' => $cart]);
            Session::flash('success',  __('content.Ajout_terminée') );
        }
        return redirect()->route('shop.produit.cart_index',$id_user);
        
    }
    public function cart_index($user_id)
    {

        if (session('TOKEN')) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . session('TOKEN'),
            ])->get(env('API_URL').'shop/produits/my-card/'.$user_id);

            $data = $response->json();
            if($data['message']=='Unauthenticated.'){
                $cartItems = session('cart', []);
                return view('cart',compact('cartItems'));
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $cartItems = $data['cartItems'];
                    }
                    return view('cart-paiement', compact('cartItems'));
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }

        } else {
            // Utilisateur non connecté : récupérer le panier depuis la session
            $cartItems = session('cart', []);
            return view('cart', compact('cartItems'));
        }
    }
    public function cart_destroy($productId)
    {
        if (session('user_id')) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . session('TOKEN'),
            ])->get(env('API_URL').'shop/produits/my-card/destroy/'.$productId);

            $data = $response->json();
            if($data['message']=='Unauthenticated.'){
                $cartItems = session('cart', []);
                return view('cart',compact('cartItems'));
            }
            else{
                if ($response->successful()) {
                    if($data['status']){

                    }

                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        } else {
            // Utilisateur non connecté : supprimer du panier dans la session
            $cart = session('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session(['cart' => $cart]);
            }
        }
        return back();
    }
  
    public function connexion(Request $request)
    {
        $cart = session('cart', []);
        $input = $request->all();

        $this->validate($request, [
            'emaill' => 'required',
            'password' => 'required',
        ]);
        $response = Http::post(env('API_URL').'login', [
            'email' => $input['emaill'],
            'password' => $input['password'],
            'cart' => $cart,
        ]);

        $data = $response->json();
//                            dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        if($data['status']){
            session([
                'TOKEN' => $data['authorisation']['token'],
                'nom' => $data['user']['nom'],
                'prenom' => $data['user']['prenom'],
                'mail' => $data['user']['mail'],
                'adresse' => $data['user']['adresse'],
                'tel' => $data['user']['tel'],
                'login' => $data['user']['email'],
                'user_id' => $data['user']['id'],
                'candidat_id' => $data['user']['candidat_id'],
                'code_instr' => DB::table('instructeurs')->where('id',
                    DB::table('candidats')->where('id',$data['user']['candidat_id'])->value('instructeur_id')
                )->value('code_instr'),
            ]);
            session()->forget('cart');
            //$cartItems = session('cart', []);
            $cartItems = $data['my_products'];
            return view('cart-paiement', compact('cartItems'));
        }
        else{
            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
            return redirect()->back();
        }
    }
    function convertToMillimes(float $amount): int {
        return (int) ($amount * 1000);
    }
    function generateRandomOrderID($length = 7) {
        // Caractères possibles dans le mot de passe
        $chars = '0123456789';

        // Convertir les octets aléatoires en une chaîne de caractères
        $bytes = random_bytes($length);
        $orderID = '';

        for ($i = 0; $i < $length; $i++) {
            $orderID .= $chars[ord($bytes[$i]) % strlen($chars)];
        }

        return $orderID;
    }
    public function payer(Request $request)
    {
        if (session('user_id')) {
            $OrderID =  $this->generateRandomOrderID(7);
            if($request->paiement_par == 'Konnect+'){
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
                ])->post('https://api.konnect.network/api/v2/payments/init-payment', [
                    'receiverWalletId' => '678a256ccd9ba8f1f72cbbef',
                    'token' => 'TND',
                    'amount' => $this->convertToMillimes($request->prix_total_input),
                    'type' => 'immediate',
                    'description' => 'Command #'.$OrderID,
                    'acceptedPaymentMethods' => ["wallet", "bank_card", "e-DINAR"],
                    'lifespan' => 10,
                    'firstName' => $request->nom_input,
                    'lastName' => $request->prenom_input,
                    'phoneNumber' => $request->tel_input,
                    'orderId' => $OrderID,
                    'webhook'=> 'https://merchant.tech/api/notification_payment',
                    'silentWebhook'=> true,
                    'successUrl'=> 'https://zengymhealth.com/',
                    'failUrl'=> 'https://api.konnect.network/payment-failure',
                    'theme'=> 'dark'
                ]);

                $data = $response->json();
                if ($response->successful()) {
             

//                    $response3 = Http::withHeaders([
//                        'Content-Type' => 'application/json',
//                        'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
//                    ])->get('https://api.konnect.network/api/v2/payments/:'.$data['paymentRef']);
//                    $data3 = $response3->json();
//                    dd($data3);
                    $body=[
                        'code' => $OrderID,
                        'user_id_input' => $request->user_id_input,
                        'prix_total_input' => $request->prix_total_input,
                        'paiement_par' => $request->paiement_par,
                        'paiement_status' => true,
                        'ref' => $data['paymentRef'],
                        'list_produits_id' => $request->list_produits_id,
                        'list_produits_desc' => $request->list_produits_desc,
                        'list_produits_prix' => $request->list_produits_prix,
                        'list_produits_qte' => $request->list_produits_qte,
                        'nom_input' => $request->nom_input,
                        'prenom_input' => $request->prenom_input,
                        'tel_input' => $request->tel_input,
                        'code_instr' => $request->code_instr,
                    ];

                }
                else {
                    dd([
                        'status_code_response' => $response->status(),
                        'headers' => $response->headers(),
                        'body' => $response->body(),
                        'json' => $response->json(),
                    ]);


                }
            }
            else{
                $body=[
                    'code' => $OrderID,
                    'user_id_input' => $request->user_id_input,
                    'prix_total_input' => $request->prix_total_input,
                    'paiement_par' => $request->paiement_par,
                    'paiement_status' => false,
                    'ref' => null,
                    'list_produits_id' => $request->list_produits_id,
                    'list_produits_desc' => $request->list_produits_desc,
                    'list_produits_prix' => $request->list_produits_prix,
                    'list_produits_qte' => $request->list_produits_qte,
                    'code_instr' => $request->code_instr,
                    'nom_input' => $request->nom_input,
                    'prenom_input' => $request->prenom_input,
                    'tel_input' => $request->tel_input,
                ];
            }

            $response2 = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type' => 'application/json',
            ])->post(env('API_URL').'shop/produits/my-card/payer', $body);
            if ($response2->successful()) {
                $data2 = $response2->json();

                if($data2['status']) {
                    if($data['payUrl'] != ''){
                        return redirect()->away($data['payUrl']);
                    }
                    else{
                        Session::flash('success',  'Commande effectuée !' );
                        return redirect()->back();
                    }
                }
                else{
                    dd([
                        'status_code_response2' => $response2->status(),
                        'headers' => $response2->headers(),
                        'body' => $response2->body(),
                        'json' => $response2->json(),
                    ]);
                }
            }
            else{
                dd([
                    'status_code_response2' => $response2->status(),
                    'headers' => $response2->headers(),
                    'body' => $response2->body(),
                    'json' => $response2->json(),
                ]);
            }
        }
        else{
            $cartItems = session('cart', []);
            return view('cart',compact('cartItems'));
        }


    }
    public function inscription(Request $request)
    {
        $response = Http::withHeaders([
           // 'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'shop/produits/cart/inscription', [
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'mail'=>$request->mail,
            'adresse'=>$request->adresse,
            'tel'=>$request->tel,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                $cartItems = session('cart', []);
                return view('cart',compact('cartItems'));
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        session([
                            'TOKEN' => $data['authorisation']['token'],
                            'nom' => $data['user']['nom'],
                            'prenom' => $data['user']['prenom'],
                            'mail' => $data['user']['mail'],
                            'adresse' => $data['user']['adresse'],
                            'tel' => $data['user']['tel'],
                            'login' => $data['user']['email'],
                            'user_id' => $data['user']['id'],
                            'candidat_id' => $data['user']['candidat_id'],
                            'code_instr' => DB::table('instructeurs')->where('id',
                                DB::table('candidats')->where('id',$data['user']['candidat_id'])->value('instructeur_id')
                            )->value('code_instr'),
                        ]);
                        session()->forget('cart');
                        //$cartItems = session('cart', []);
                        $cartItems = $data['my_products'];
                        return view('cart-paiement', compact('cartItems'));
                    }
                    else{
                        Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                        return redirect()->back();
                    }
                    return view('cart-paiement', compact('cartItems'));
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            dd($response->body());
        }
    }
}
