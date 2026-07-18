<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PassageDeGradeController extends Controller
{
    public function index(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'passage_de_grades');

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
                    }
                    return view('admin.PassageDeGrade.PassageDeGrade_component',
                        [
                            'liste' => $liste,
                            'list_cat' => $list_cat,
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
                }
                return view('admin.PassageDeGrade.PassageDeGrade_component',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }





    }
    public function add(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'passage_de_grades/add', [
            'des'=>$request->des,
            'nbr_event'=>$request->nbr_event,
            'nbr_masterclass'=>$request->nbr_masterclass,
            'categ_instructeur_id_1'=>$request->categ_instructeur_id_1,
            'categ_instructeur_id_2'=>$request->categ_instructeur_id_2,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }
                    return redirect()->route('admin.passage_de_grade.index');
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
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.passage_de_grade.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'passage_de_grades/edit/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail = $data['detail'];
                        $detail_categ_instructeur_id_1 = $data['detail_categ_instructeur_id_1'];
                        $detail_categ_instructeur_id_2 = $data['detail_categ_instructeur_id_2'];
                        $list_cat = $data['list_cat'];
                    }

                    return view('admin.PassageDeGrade.modifier.modifier_component',
                        [
                            'detail' => $detail,
                            "detail_categ_instructeur_id_1" => $detail_categ_instructeur_id_1,
                            "detail_categ_instructeur_id_2" => $detail_categ_instructeur_id_2,
                            "list_cat" => $list_cat,
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
                    $detail_categ_instructeur_id_1 = $data['detail_categ_instructeur_id_1'];
                    $detail_categ_instructeur_id_2 = $data['detail_categ_instructeur_id_2'];
                    $list_cat = $data['list_cat'];
                }
                return view('admin.PassageDeGrade.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        "detail_categ_instructeur_id_1" => $detail_categ_instructeur_id_1,
                        "detail_categ_instructeur_id_2" => $detail_categ_instructeur_id_2,
                        "list_cat" => $list_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function update($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'passage_de_grades/update/'.$id, [
            'des'=>$request->des,
            'nbr_event'=>$request->nbr_event,
            'nbr_masterclass'=>$request->nbr_masterclass,
            'categ_instructeur_id_1'=>$request->categ_instructeur_id_1,
            'categ_instructeur_id_2'=>$request->categ_instructeur_id_2,
        ]);

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
                    return redirect()->route('admin.passage_de_grade.index');
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
                return redirect()->route('admin.passage_de_grade.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'passage_de_grades/delete', [
            'champ_id'=>$request->champ_id,
        ]);

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
                    return redirect()->route('admin.passage_de_grade.index');
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
                return redirect()->route('admin.passage_de_grade.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function get_users(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'passage_de_grades/get_users');

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $userslist = $data['liste'];

                    }

                    return view('admin.PassageDeGrade.users.PassageDeGrade_component',
                        [
                            'liste' => $userslist,
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
                    $userslist = $data['liste'];
                }
                return view('admin.PassageDeGrade.users.PassageDeGrade_component',
                    [
                        'liste' => $userslist,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }





    }
    public function devenir_instructeur($id_user){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'passage_de_grades/get_users/devenir_instructeur/'.$id_user);

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
    public function passage_grade_instructeur($id_user){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'passage_de_grades/get_users/passage_grade_instructeur/'.$id_user);

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
                    else{
                        Session::flash('error',  __('Pas de grade disponible!') );
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
                else{
                    Session::flash('error',  __('Pas de grade disponible!') );
                }
                return redirect()->back();
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
}
