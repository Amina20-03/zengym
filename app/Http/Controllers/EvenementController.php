<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class EvenementController extends Controller
{
    public function index_evenement($id_categ){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'evennements_by_categ/'.$id_categ);

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $list_cat = $data['list_cat'];
                        $nbr_evenements = $data['nbr_evenements'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];
                    }
                    return view('evenement.evenement_component',
                        [
                            'liste' => $liste,
                            'list_cat' => $list_cat,
                            'nbr_evenements' => $nbr_evenements,
                            'detail_cat' => $detail_cat,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'heure_deb' => $heure_deb,
                            'heure_fin' => $heure_fin,
                        ]);
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
                    $liste = $data['liste'];
                    $list_cat = $data['list_cat'];
                    $nbr_evenements = $data['nbr_evenements'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('evenement.evenement_component',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                        'nbr_evenements' => $nbr_evenements,
                        'detail_cat' => $detail_cat,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'heure_deb' => $heure_deb,
                        'heure_fin' => $heure_fin,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function detail_demande_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $list_cat = $data['list_cat'];
                        $detail_cat = $data['detail_cat'];
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                    }

                    return view('evenement.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                        ]);
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
                    $detail = $data['detail'];
                    $list_cat = $data['list_cat'];
                    $detail_cat = $data['detail_cat'];
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                }
                return view('evenement.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'evennements/details/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                
                    if($data['status']){
                        $detail = $data['detail'];
                        $list_cat = $data['list_cat'];
                        $detail_cat = $data['detail_cat'];
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                    }
                    return view('evenement.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                        ]);
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
                    $detail = $data['detail'];
                    $list_cat = $data['list_cat'];
                    $detail_cat = $data['detail_cat'];
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                }
                return view('evenement.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_evenement_photo($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $detail_photos = $data['detail_photos'];
                        $detail_videos = $data['detail_videos'];
                    }

                    return view('evenement.details.photos',
                        [
                            "detail" => $detail,
                            "detail_photos" => $detail_photos,
                            "detail_videos" => $detail_videos,
                        ]);
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
                    $detail = $data['detail'];
                    $detail_photos = $data['detail_photos'];
                    $detail_videos = $data['detail_videos'];
                }

                return view('evenement.details.photos',
                    [
                        "detail" => $detail,
                        "detail_photos" => $detail_photos,
                        "detail_videos" => $detail_videos,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_evenement_video($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $detail_photos = $data['detail_photos'];
                        $detail_videos = $data['detail_videos'];

                    }

                    return view('evenement.details.videos',
                        [
                            "detail" => $detail,
                            "detail_photos" => $detail_photos,
                            "detail_videos" => $detail_videos,
                        ]);
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
                    $detail = $data['detail'];
                    $detail_photos = $data['detail_photos'];
                    $detail_videos = $data['detail_videos'];

                }

                return view('evenement.details.videos',
                    [
                        "detail" => $detail,
                        "detail_photos" => $detail_photos,
                        "detail_videos" => $detail_videos,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function inscription_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $list_cat = $data['list_cat'];
                        $detail_cat = $data['detail_cat'];
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $instructeurlist = $data['instructeurlist'];
                        $liste_inst = $data['liste_inst'];
                    }

                    return view('evenement.details.insription',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                            "instructeurlist" => $instructeurlist,
                            "liste_inst" => $liste_inst,
                        ]);
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
                    $detail = $data['detail'];
                    $list_cat = $data['list_cat'];
                    $detail_cat = $data['detail_cat'];
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $instructeurlist = $data['instructeurlist'];
                    $liste_inst = $data['liste_inst'];
                }
                return view('admin.evenement.details.insription',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                        "instructeurlist" => $instructeurlist,
                        "liste_inst" => $liste_inst,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function inscription_evenement_connexion(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'emaill' => 'required',
            'password' => 'required',
        ]);
        $response = Http::post(env('API_URL').'login', [
            'email' => $input['emaill'],
            'password' => $input['password'],
        ]);

        $data = $response->json();
        if($data['status']){

            if ($data['user']['role'] == 'CANDIDAT'){
                session([
                    'TOKEN' => $data['authorisation']['token'],
                    'nom' => $data['user']['nom'],
                    'prenom' => $data['user']['prenom'],
                    'mail' => $data['user']['mail'],
                    'adresse' => $data['user']['adresse'],
                    'tel' => $data['user']['tel'],
                    'login' => $data['user']['email'],
                    'user_id' => $data['user']['id'],
                    'role' => $data['user']['role'],
                ]);

            }
            else{
                Session::flash('error', "Vous n'étes pas un candidat !");

            }
            return redirect()->back()->with('id_event',$request->id_event);

        }
        else{
            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
            return redirect()->back()->with('id_event',$request->id_event);
        }
    }
    public function inscription_candidat_evenement(Request $request){
        if($request->password !== $request->Confirmer_le_mot_de_passe){
            Session::flash('error', 'Le mot de passe de confirmation est incorrect');
            return redirect()->back()->with('id_form',$request->id_event);
        }
        else{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type' => 'application/json',
            ])->post(env('API_URL').'evennements/inscription/candidats/register', [
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'adr'=>$request->adr,
                'tel1'=>$request->tel1,
                'tel2'=>$request->tel2,
                'email'=>$request->email,
                'password'=>$request->password,
            ]);

            $data = $response->json();
            if($data){
                if($data['message']=='Unauthenticated.'){
                    return view('auth.login');
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
                                'role' => $data['user']['role'],
                            ]);

                            //Session::flash('success', 'Veuillez consulter votre boîte e-mail afin d\'accéder aux identifiants de votre nouveau compte !');
                            Session::flash('success', 'Votre compte a été créé ! Vous pouvez maintenant procéder au paiement !');
                            return redirect()->back()->with('id_event',$request->id_event);
                        }
                        else{

                            Session::flash('error', $data['message']);
                            return redirect()->back()->with('id_event',$request->id_event);
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
                        session([
                            'TOKEN' => $data['authorisation']['token'],
                            'nom' => $data['user']['nom'],
                            'prenom' => $data['user']['prenom'],
                            'mail' => $data['user']['mail'],
                            'adresse' => $data['user']['adresse'],
                            'tel' => $data['user']['tel'],
                            'login' => $data['user']['email'],
                            'user_id' => $data['user']['id'],
                            'role' => $data['user']['role'],
                        ]);
                        Session::flash('success', 'Veuillez consulter votre boîte e-mail afin d\'accéder aux identifiants de votre nouveau compte !');
                        return redirect()->back()->with('id_form',$request->id_event);
                    }
                    else{
                        Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                        return redirect()->back()->with('id_form',$request->id_event);
                    }
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }

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
    function convertToMillimes(float $amount): int {
        return (int) ($amount * 1000);
    }
    public function payer_candidat(Request $request,$event_id){


        $body = null;



        $detail_EvenementCandidat = DB::table('evenement_candidats')->where('event_id',$event_id)
            ->where('user_id',$request->user_id)
            ->get();
        if((empty($detail_EvenementCandidat)) && (count($detail_EvenementCandidat)==0)){
            if($request->methode_paiement == 'en_espece'){
                $body=[
                    'code' => '',
                    'user_id' => $request->user_id,
                    'methode_paiement' => $request->methode_paiement,
                    'paiement_status' => false,
                    'date_validation' => null,
                    'ref' => '',
                ];

                if ($body){
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . session('TOKEN'),
                        'Content-Type' => 'application/json',
                    ])->post(env('API_URL').'evennements/payer/candidats/'.$event_id, $body);

                    $data = $response->json();
                    if($data){
                        if($data['message']=='Unauthenticated.'){
                            return view('auth.login');
                        }
                        else{
                            if ($response->successful()) {
                                if($data['status']){

                                    Session::flash('success', 'Inscription terminée !');
                                    return redirect()->back()->with('id_form',$event_id);
                                }
                                else{

                                    Session::flash('error', $data['message']);
                                    return redirect()->back()->with('id_form',$event_id);
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
                                Session::flash('success', 'Inscription terminée !');
                                return redirect()->back()->with('id_event',$event_id);
                            }
                            else{
                                Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                                return redirect()->back()->with('id_event',$event_id);
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
                $OrderID =  $this->generateRandomOrderID(7);
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
                ])->post('https://api.konnect.network/api/v2/payments/init-payment', [
                    'receiverWalletId' => '678a256ccd9ba8f1f72cbbef',
                    'token' => 'TND',
                    'amount' => $this->convertToMillimes($request->frais_formation),
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
                        }
                    }
                    $response2 = Http::withHeaders([
                        'Authorization' => 'Bearer ' . session('TOKEN'),
                        'Content-Type' => 'application/json',
                    ])->post(env('API_URL').'evennements/payer/candidats/'.$event_id,
                        [
                            'code' => $OrderID,
                            'user_id' => $request->user_id,
                            'methode_paiement' => $request->methode_paiement,
                            'paiement_status' => $paiement_status,
                            'date_validation' => date('Y-m-d'),
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
                                    return redirect()->back()->with('id_event',$event_id);
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
                                return redirect()->back()->with('id_event',$event_id);
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
        else{
            Session::flash('error', 'Vous êtes déjà inscrit(e) à cet événement ! Vous pouvez la consulter dans votre compte !');
            return redirect()->back()->with('id_event',$event_id);
        }


    }
}
