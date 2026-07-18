<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class EvenementController extends Controller
{
    public function index_evennement(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements');

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                    }
                    return view('instructeur.evennement.evennement_component',
                        [
                            'liste' => $liste,
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
                    $list_type_even = $data['list_type_even'];
                }
                return view('instructeur.evennement.evennement_component',
                    [
                        'liste' => $liste,
                        'list_type_even' => $list_type_even,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function mes_demandes(){
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'evennements/demandes/my', [
            'instructeur_id' => session('instructeur_id'),
        ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        return view('instructeur.evennement.demande.mes_demandes_component', [
            'liste' => $data['liste'] ?? [],
        ]);
    }

    public function index_dmd_evennement(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/demandes/list');

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                    }
                    return view('instructeur.evennement.demande.demande_component',
                        [
                            'liste' => $liste,
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
                }
                return view('instructeur.evennement.evennement_component',
                    [
                        'liste' => $liste,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function create_demande(Request $request){

        // Si type_even_id non fourni → rediriger avec modal
        if (empty($request->type_even_id)) {
            return redirect()->route('instructeur.evennement.demande.index')
                ->with('open_type_modal', true);
        }

        // Charger les données nécessaires depuis le WS
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'evennements/create/' . $request->type_even_id);

        $data = $response->json();

        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        $list_instructeurs = $data['list_instructeurs'] ?? [];
        $list_type_even    = $data['list_type_even']    ?? [];
        $list_pays         = $data['list_pays']         ?? [];
        $detail_type_event = $data['detail_type_event'] ?? [['desc' => '']];

        // Fallback pays
        if (empty($list_pays)) {
            $paysRaw   = \Illuminate\Support\Facades\DB::table('pays')->select('id', 'desc')->get();
            $list_pays = $paysRaw->map(fn($p) => ['id' => $p->id, 'desc' => $p->desc])->toArray();
        }

        // Fallback instructeurs
        if (empty($list_instructeurs)) {
            $instrRaw = \Illuminate\Support\Facades\DB::table('instructeurs')
                ->join('users', 'users.instructeur_id', '=', 'instructeurs.id')
                ->select('instructeurs.id','instructeurs.profession','instructeurs.cin',
                         'users.nom','users.prenom','users.mail','users.tel','users.adresse')
                ->get();
            $list_instructeurs = $instrRaw->map(fn($i) => [
                'id'         => $i->id,
                'nom'        => $i->nom,
                'prenom'     => $i->prenom,
                'mail'       => $i->mail,
                'tel'        => $i->tel,
                'adresse'    => $i->adresse,
                'profession' => $i->profession,
                'cin'        => $i->cin,
                'categ_instructeur_desc' => '',
            ])->toArray();
        }

        // Récupérer les événements existants pour affichage dans le calendrier
        $eventsResponse = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'fetch_evennements_cal');

        $eventsData = $eventsResponse->json();
        $existing_events = [];
        if ($eventsData && isset($eventsData['evenlist'])) {
            foreach ($eventsData['evenlist'] as $ev) {
                // Couleur selon statut
                $approuver = $ev['approuver'] ?? null;
                $refuser   = $ev['refuser']   ?? null;

                $color = '#6a0dad'; // accepté par défaut
                if ($approuver === null || $approuver === false || $approuver == 0) {
                    $color = '#f59e0b'; // en attente
                }
                if ($refuser) {
                    $color = '#ef4444'; // refusé
                }

                $existing_events[] = [
                    'id'    => $ev['id'] ?? null,
                    'title' => ($ev['code'] ?? '') . ' - ' . ($ev['desc'] ?? ''),
                    'start' => ($ev['date_deb'] ?? '') . 'T' . ($ev['heure_deb'] ?? '00:00'),
                    'end'   => ($ev['date_fin'] ?? '') . 'T' . ($ev['heure_fin'] ?? '00:00'),
                    'color' => $color,
                    'extendedProps' => [
                        'ev_id'          => $ev['id']          ?? null,
                        'code'           => $ev['code']         ?? '',
                        'desc'           => $ev['desc']         ?? '',
                        'titre'          => $ev['titre']        ?? ($ev['desc'] ?? ''),
                        'sujet'          => $ev['sujet']        ?? '',
                        'date_deb'       => $ev['date_deb']     ?? '',
                        'date_fin'       => $ev['date_fin']     ?? '',
                        'heure_deb'      => $ev['heure_deb']    ?? '',
                        'heure_fin'      => $ev['heure_fin']    ?? '',
                        'frais'          => $ev['frais']        ?? 0,
                        'devise'         => $ev['devise']       ?? 'DT',
                        'salle'          => $ev['salle']        ?? '',
                        'nbr_place_dispo'=> $ev['nbr_place_dispo'] ?? 0,
                        'approuver'      => $approuver,
                        'refuser'        => $refuser,
                        'instructeur_id' => $ev['instructeur_id'] ?? null,
                    ],
                ];
            }
        }

        return view('instructeur.evennement.demande.ajouter.ajouter_component', [
            'liste'             => $list_instructeurs,
            'list_type_even'    => $list_type_even,
            'list_pays'         => $list_pays,
            'detail_type_event' => $detail_type_event,
            'type_even_id'      => $request->type_even_id,
            'existing_events'   => $existing_events,
        ]);
    }
    public function add_evennement(Request $request){

        $token = session('TOKEN');

        // Construire le multipart manuellement via Guzzle directement
        $multipart = [];

        $fields = [
            'desc'                      => $request->desc ?? '',
            'type_even_id'              => $request->type_even_id ?? '',
            'nbr_place_dispo'           => $request->nbr_place_dispo ?? '0',
            'date_deb'                  => $request->date_deb ?? '',
            'date_fin'                  => $request->date_fin ?? '',
            'heure_deb'                 => $request->heure_deb ?? '',
            'heure_fin'                 => $request->heure_fin ?? '',
            'nbr_participant'           => '0',
            'nbr_place_restant'         => '0',
            'instr_id_list'             => $request->instr_id_list ?? '',
            'titre'                     => $request->titre ?? '',
            'sujet'                     => $request->sujet ?? '',
            'salle'                     => $request->salle ?? '',
            'info_sur_lieu'             => $request->info_sur_lieu ?? '',
            'frais'                     => $request->frais ?? '0',
            'devise'                    => $request->devise ?? 'DT',
            'contact'                   => $request->contact ?? '',
            'participant_a_levennement' => $request->participant_a_levennement ?? '',
            'participant_non_inscrit'   => $request->participant_non_inscrit ?? '',
            'pays_id'                   => $request->pays_id ?? '',
            'instructeur_id'            => session('instructeur_id') ?? '',
        ];

        foreach ($fields as $name => $value) {
            $multipart[] = [
                'name'     => $name,
                'contents' => (string)$value,
            ];
        }

        // Langue array
        $langues = $request->langue ?? [];
        if (is_array($langues)) {
            foreach ($langues as $lang) {
                $multipart[] = [
                    'name'     => 'langue[]',
                    'contents' => (string)$lang,
                ];
            }
        }

        // Affiche fichier
        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');
            $multipart[] = [
                'name'     => 'affiche',
                'contents' => fopen($file->getRealPath(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ];
        }

        // Appel Guzzle direct
        $client = new \GuzzleHttp\Client();
        try {
            $guzzleResponse = $client->post(env('API_URL') . 'evennements/demandes/add', [
                'headers'   => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $data = json_decode($guzzleResponse->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Session::flash('error', 'Erreur : ' . $e->getMessage());
            return redirect()->back();
        }

        if (isset($data['message']) && $data['message'] == 'Unauthenticated.') {
            return view('auth.login');
        }

        // Conflit horaire (409)
        if ($guzzleResponse->getStatusCode() === 409 || (!($data['status'] ?? true) && !empty($data['message']))) {
            return redirect()->back()
                ->withInput()
                ->with('error', $data['message'] ?? 'Conflit horaire détecté. Veuillez choisir une autre plage horaire.');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Ajout_terminée'));
            return redirect()->route('instructeur.evennement.demande.index');
        }

        Session::flash('error', 'Une erreur est survenue. Veuillez réessayer.');
        return redirect()->back();
    }

    public function realiser_evenement($id){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/demande/realiser/'.$id);
        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Suppression_terminée') );
                    }
                    return redirect()->route('instructeur.evennement.index',$id);
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
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('instructeur.evennement.index',$id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function medias_evennement($id){
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'evennements/details/photos/' . $id);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        return view('instructeur.evennement.demande.medias_component', [
            'detail'        => $data['detail']        ?? [],
            'detail_photos' => $data['detail_photos'] ?? [],
            'detail_videos' => $data['detail_videos'] ?? [],
            'event_id'      => $id,
        ]);
    }

    public function add_video_evennement($id, Request $request){
        if (!$request->hasFile('videos')) {
            return redirect()->back()->with('error', 'Aucune vidéo sélectionnée.');
        }

        $client    = new \GuzzleHttp\Client();
        $multipart = [];

        foreach ($request->file('videos') as $file) {
            $multipart[] = [
                'name'     => 'videos[]',
                'contents' => fopen($file->getRealPath(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ];
        }

        try {
            $guzzleResponse = $client->post(env('API_URL') . 'evennements/details/videos/add/' . $id, [
                'headers'   => [
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Accept'        => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $data = json_decode($guzzleResponse->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Session::flash('error', 'Erreur upload vidéo : ' . $e->getMessage());
            return redirect()->back();
        }

        if ($data['status'] ?? false) {
            Session::flash('success', 'Vidéo(s) ajoutée(s).');
        }
        return redirect()->back();
    }

    public function delete_video_evennement($id){
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'evennements/details/videos/delete/' . $id);

        Session::flash('success', 'Vidéo supprimée.');
        return redirect()->back();
    }

    public function photos_evennement($id){
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
                    }
                    return view('instructeur.evennement.photos',
                        [
                            'detail' => $detail,
                            "detail_photos" => $detail_photos,
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
                }
                return view('instructeur.evennement.photos',
                    [
                        'detail' => $detail,
                        "detail_photos" => $detail_photos,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
    public function add_photos_evennement($id, Request $request){
        if (!$request->hasFile('gallerie')) {
            return redirect()->back()->with('error', 'Aucune image sélectionnée.');
        }

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ]);

        foreach ($request->file('gallerie') as $file) {
            $http = $http->attach(
                'photos[]',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            );
        }

        $response = $http->post(env('API_URL') . 'evennements/details/photos/add/' . $id);
//                                            dd([
//                    'status_code' => $response->status(),
//                    'headers' => $response->headers(),
//                    'body' => $response->body(),
//                    'json' => $response->json(),
//                ]);
        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Modification_terminée') );
                    }
                    return redirect()->back();
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
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->back();
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function delete_photo_evennement($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',

        ])->get(env('API_URL').'evennements/details/photos/delete/'.$id);
//                                            dd([
//                    'status_code' => $response->status(),
//                    'headers' => $response->headers(),
//                    'body' => $response->body(),
//                    'json' => $response->json(),
//                ]);
        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
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
                    return redirect()->back();
                }

            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
    public function delete_dmd_evennement(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evennements/demandes/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();

        if($data && $data['message'] ?? '' == 'Unauthenticated.'){
            return view('auth.login');
        }

        if ($response->successful()) {
            Session::flash('success', __('content.Suppression_terminée'));
        } else {
            Session::flash('error', 'Une erreur est survenue.');
        }
        return redirect()->route('instructeur.evennement.demande.index');
    }

    public function update_demande($id, Request $request){
        $payload = [
            'titre'                     => $request->titre ?? '',
            'sujet'                     => $request->sujet ?? '',
            'desc'                      => $request->desc ?? '',
            'salle'                     => $request->salle ?? '',
            'info_sur_lieu'             => $request->info_sur_lieu ?? '',
            'date_deb'                  => $request->date_deb ?? '',
            'date_fin'                  => $request->date_fin ?? '',
            'heure_deb'                 => $request->heure_deb ?? '',
            'heure_fin'                 => $request->heure_fin ?? '',
            'frais'                     => $request->frais ?? 0,
            'devise'                    => $request->devise ?? 'DT',
            'nbr_place_dispo'           => $request->nbr_place_dispo ?? 0,
            'contact'                   => $request->contact ?? '',
            'participant_a_levennement' => $request->participant_a_levennement ?? '',
            'participant_non_inscrit'   => $request->participant_non_inscrit ?? '',
            'pays_id'                   => $request->pays_id ?? '',
        ];

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ]);

        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');
            $response = $http
                ->attach('affiche', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->post(env('API_URL') . 'evennements/demandes/update/' . $id, $payload);
        } else {
            $response = $http
                ->asForm()
                ->post(env('API_URL') . 'evennements/demandes/update/' . $id, $payload);
        }

        $data = $response->json();
        if (isset($data['message']) && $data['message'] == 'Unauthenticated.') return view('auth.login');
        if ($data['status'] ?? false) {
            Session::flash('success', 'Demande mise à jour.');
        } else {
            Session::flash('error', $data['message'] ?? 'Erreur lors de la mise à jour.');
        }
        return redirect()->route('instructeur.evennement.demande.index');
    }

}

