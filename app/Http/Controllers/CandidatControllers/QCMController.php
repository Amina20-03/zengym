<?php

namespace App\Http\Controllers\CandidatControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class QCMController extends Controller
{
    public function examen_page(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidat/examen_page');

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $examen = $data['examen'];
                        $questions = $data['questions'];
                        $choix_quest = $data['choix_quest'];
                        $ExamenUser_Check = $data['ExamenUser_Check'];

                    }
                    if (isset($ExamenUser_Check) && $ExamenUser_Check[0]['score'] == '0') {

                        return view('candidat.qcm.passer.passer_component', [
                            "examen" => $examen,
                            "questions" => $questions,
                            "choix_quest" => $choix_quest,
                            "ExamenUser_Check" => $ExamenUser_Check,
                        ]);
                    } else {
                        return view('candidat.qcm.passer.result.result_component', [
                            'score' => $ExamenUser_Check[0]['score'] ?? null,
                            'res_examen' => $ExamenUser_Check[0]['res_examen'] ?? '',
                            'commentaire' => $ExamenUser_Check[0]['commentaire'] ?? '',
                            'examen' => $examen[0],
                        ]);
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
                    $examen = $data['examen'];
                    $questions = $data['questions'];
                    $choix_quest = $data['choix_quest'];
                }
                return view('candidat.qcm.passer.passer_component',
                    [
                        "examen" => $examen,
                        "questions" => $questions,
                        "choix_quest" => $choix_quest,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function valider_examen(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidat/valider_examen', [
            'id_examen'=>$request->id_examen,
        ]);
//        dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $score = $data['score'];
                    $res_examen = $data['res_examen'];
                    $commentaire = $data['commentaire'];
                    $examen = $data['examen'];
      
                }
                return view('candidat.qcm.passer.result.result_component',
                    [
                        'score' => $score,
                        'res_examen' => $res_examen,
                        'commentaire' => $commentaire,
                        'examen' => $examen,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function get_cerif($examen_id){
        return view('candidat.qcm.passer.certificat',
            [
                'examen_id' => $examen_id,
            ]);
    }

}
