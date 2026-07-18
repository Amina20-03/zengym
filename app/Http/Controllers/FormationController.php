<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Firebase\JWT\JWT;

class FormationController extends Controller
{
    public function index_formation($id_categ){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'formations_by_categ/'.$id_categ);

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
                        $nbr_formations = $data['nbr_formations'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];
                    }

                    return view('formation.formation_component',
                        [
                            'liste' => $liste,
                            'list_cat' => $list_cat,
                            'nbr_formations' => $nbr_formations,
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
                    $nbr_formations = $data['nbr_formations'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('formation.formation_component',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                        'nbr_formations' => $nbr_formations,
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
    public function getVideo()
    {
        $path=storage_path('app/public').'/formations/users/3/test/videos/qtmOJcmdDNoZsoSWYqB1RzlUqpOEKQNTmAoM9eeS.mp4';
        // Ensure the path is correct
        $fullPath = 'public/' . $path;

        // Check if the file exists
        if (!Storage::exists($fullPath)) {
            abort(404, 'File not found');
        }

        // Get the file's MIME type
        $mime = Storage::mimeType($fullPath);

        // Extract the filename from the path
        $filename = basename($path);

        // Stream the file to the client
        return response()->stream(function() use ($fullPath) {
            $stream = Storage::readStream($fullPath);
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
    public function detail_demande_formation($id){
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
//dd(Storage::url('app/public/'.$detail[0]['videos'][0]['path']));
                    return view('formation.details.details_component',
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
                return view('formation.details.details_component',
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

    public function iframe_carousel_photos($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];

                    }
//dd(Storage::url('app/public/'.$detail[0]['videos'][0]['path']));
                    return view('formation.details.iframe_carousel_photos',
                        [
                            "detail" => $detail,

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

                }
                return view('formation.details.iframe_carousel_photos',
                    [
                        "detail" => $detail,

                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_formation_inscription_form($id){
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
                    return view('formation.inscription.inscription_component',
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
                return view('formation.inscription.inscription_component',
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
//                                            dd([
//                    'status_code' => $response->status(),
//                    'headers' => $response->headers(),
//                    'body' => $response->body(),
//                    'json' => $response->json(),
//                ]);
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
            return redirect()->back()->with('id_form',$request->id_formation);
        }
        else{
            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
            return redirect()->back()->with('id_form',$request->id_formation);
        }
    }
    public function inscription_candidat(Request $request,$id_form){

        $recaptcha_response  = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'), // À ajouter dans .env
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $recaptcha = $recaptcha_response->json();
        if (!($recaptcha['success'] ?? false)) {
            return back()->withErrors(['g-recaptcha-response' => 'Veuillez vérifier que vous n\'êtes pas un robot.'])->withInput();
        }
        if($request->password !== $request->Confirmer_le_mot_de_passe){
            Session::flash('error', 'Le mot de passe de confirmation est incorrect');
            return redirect()->back()->with('id_form',$id_form);
        }
        else{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type' => 'application/json',
            ])->post(env('API_URL').'formations/inscription/candidats/'.$id_form, [
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'adr'=>$request->adr,
                'tel1'=>$request->tel1,
                'tel2'=>$request->tel2,
                'email'=>$request->email,
                'formation_id'=>$id_form,
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

                            Session::flash('success', 'Veuillez consulter votre boîte e-mail afin d\'accéder aux identifiants de votre nouveau compte !');
                            return redirect()->back()->with('id_form',$id_form);
                        }
                        else{

                            Session::flash('error', $data['message']);
                            return redirect()->back()->with('id_form',$id_form);
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
                        Session::flash('success', 'Félicitations ! Votre compte a bien été créé. Il ne vous reste plus qu’à compléter le paiement pour finaliser votre inscription');
                        return redirect()->back()->with('id_form',$id_form);
                    }
                    else{
                        Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                        return redirect()->back()->with('id_form',$id_form);
                    }
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }

    }
    public function payer_candidat(Request $request,$id_form){
        dd('hello');
        $body = null;
        if($request->methode_paiement == 'en_espece'){
            $body=[
                'code' => '',
                'user_id' => $request->user_id,
                'methode_paiement' => 'En espèces',
                'paiement_status' => false,
                'date_validation' => null,
                'ref' => '',
            ];

            if ($body){
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'formations/payer/candidats/'.$id_form, $body);

                $data = $response->json();
                if($data){
                    if($data['message']=='Unauthenticated.'){
                        return view('auth.login');
                    }
                    else{
                        if ($response->successful()) {
                            if($data['status']){

                                Session::flash('success', 'Inscription terminée !');
                                return redirect()->back()->with('id_form',$id_form);
                            }
                            else{

                                Session::flash('error', $data['message']);
                                return redirect()->back()->with('id_form',$id_form);
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
                            return redirect()->back()->with('id_form',$id_form);
                        }
                        else{
                            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
                            return redirect()->back()->with('id_form',$id_form);
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
                        $date_validation= date('Y-m-d');
                    }
                }
                $response2 = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'formations/payer/candidats/'.$id_form,
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
                                return redirect()->back()->with('id_form',$id_form);
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
                            return redirect()->back()->with('id_form',$id_form);
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
    public function show_formation($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'formations/en_ligne/' . $id);

        if ($response->unauthorized()) {
            return view('auth.login');
        }

        if (! $response->successful()) {
            dd($response->body()); // ou redirect avec erreur
        }

        $data = $response->json();

        if (!$data['status']) {
            abort(403, $data['message']);
        }

        return view('formation.enligne.show', [
            'formation' => $data['formation'],
        ]);
    }

    public function add_enligne_url(Request $request)
    {
        DB::table('formations')->where('id',$request->formation_id)
            ->update([
                'enligne_url'=>$request->enligne_url
            ]);

        Session::flash('success', 'Le lien est bien partagé !');
        return redirect()->back();
    }

}
