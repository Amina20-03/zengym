<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Firebase\JWT\JWT;

class DevenirAdherentController extends Controller
{
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
    public function payer_candidat(Request $request,$id_type_abo){
        $body = null;
        //dd($request->methode_paiement);
        if($request->methode_paiement == 'en_espece'){
            $body=[
                'code' => '',
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'mail' => $request->mail,
                'adr' => $request->adr,
                'password' => $request->password,
                'methode_paiement' => 'En espèces',
                'titre' => $request->titre,
                'date_paie' => date('Y-m-d'),
                'paiement_status' => false,
                'date_validation' => null,
                'ref' => '',
            ];

            if ($body){
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'devenir_adherent/payer/candidats/'.$id_type_abo, $body);

                $data = $response->json();
                if($data){
                    if($data['message']=='Unauthenticated.'){
                        return view('auth.login');
                    }
                    else{
                        if ($response->successful()) {
                            if($data['status']){

                                Session::flash('success', $data['message']);
                                return redirect()->back();
                            }
                            else{

                                Session::flash('error', $data['message']);
                                return redirect()->back();
                            }

                        }
                        else {
                            // Handle unsuccessful response
                            dd($response->body());

                        }
                    }
                }
                else{
                    if ($response->successful()) {
                        if($data['status']){
                            Session::flash('success', $data['message']);
                            return redirect()->back();
                        }
                        else{
                            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                            return redirect()->back();
                        }
                    }
                    else {
                        // Handle unsuccessful response
                        dd($response->body());

                    }
                }
            }
        }
        elseif($request->methode_paiement == 'Konnect+'){
            $paiement_status = false;
            $date_validation = null;
            $OrderID =  $this->generateRandomOrderID(7);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
            ])->post('https://api.konnect.network/api/v2/payments/init-payment', [
                'receiverWalletId' => '678a256ccd9ba8f1f72cbbef',
                'token' => 'TND',
                'amount' => $this->convertToMillimes($request->frais),
                'type' => 'immediate',
                'description' => 'Command #'.$OrderID,
                'acceptedPaymentMethods' => ["wallet", "bank_card", "e-DINAR"],
                'lifespan' => 10,
                'firstName' => $request->nom,
                'lastName' => $request->prenom,
                'phoneNumber' => $request->tel1,
                'orderId' => $OrderID,
                'webhook'=> 'https://merchant.tech/api/notification_payment',
                'silentWebhook'=> true,
                'successUrl'=> 'https://api.konnect.network/payment-success',
                'failUrl'=> 'https://api.konnect.network/payment-failure',
                'theme'=> 'dark'
            ]);

            $data = $response->json();
            if ($response->successful()) {
                $paymentId = $data['paymentRef']; // Your payment reference

                $response3 = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
                ])->get("https://api.konnect.network/api/v2/payments/{$paymentId}");
                $data3 = $response3->json();
                if ($response->successful()) {
                    if ($data3['payment']['status'] == "completed"){
                        $paiement_status = true;
                        $date_validation= date('Y-m-d');
                    }
                }
                $response2 = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'devenir_adherent/payer/candidats/'.$id_type_abo,
                    [
                        'code' => $OrderID,
                        'user_id' => $request->user_id,
                        'methode_paiement' => $request->methode_paiement,
                        'paiement_status' => $paiement_status,
                        'date_validation' => $date_validation,
                        'ref' => $data['paymentRef'],
                    ]
                );

                $data2 = $response2->json();
                //                                    dd([
                //            'status_code' => $response2->status(),
                //            'headers' => $response2->headers(),
                //            'body' => $response2->body(),
                //            'json' => $response2->json(),
                //        ]);
                if($data2){
                    if($data2['message']=='Unauthenticated.'){
                        return view('auth.login');
                    }
                    else{
                        if ($response2->successful()) {
                            if($data2['status']){
                                if($data['payUrl'] != ''){
                                    return redirect()->away($data['payUrl']);
                                }
                                else{
                                    dd($response->body());
                                }
                            }
                            else{

                                Session::flash('error', $data2['message']);
                                return redirect()->back();
                            }

                        }
                        else {
                            // Handle unsuccessful response
                            dd($response->body());

                        }
                    }
                }
                else{
                    if ($response2->successful()) {
                        if($data2['status']){
                            if($data['payUrl'] != ''){
                                return redirect()->away($data['payUrl']);
                            }
                            else{
                                dd($response->body());
                            }
                        }
                        else{

                            Session::flash('error', $data2['message']);
                            return redirect()->back();
                        }

                    }
                    else {
                        // Handle unsuccessful response
                        dd($response->body());

                    }
                }

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






    }
}