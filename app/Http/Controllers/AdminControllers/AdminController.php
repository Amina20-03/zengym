<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index_admin(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'admins');

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

                    return view('admin.utilisateur.admin.admin_component',
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
            dd($response->body());
        }


    }
    public function add_admin(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'admin_add', [
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'mail'=>$request->mail,
            'adresse'=>$request->adresse,
            'tel'=>$request->tel,
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
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }
                    return redirect()->route('admin.admin.index');
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
    public function edit_admin($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'admin/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail_user = $data['detail_user'];


                    }
                    return view('admin.utilisateur.admin.modifier.modifier_component',
                        [

                            "detail_user" => $detail_user,
                        ]);
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
    public function update_admin($id,Request $request){


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'admin_update/'.$id, [
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'mail'=>$request->mail,
            'adresse'=>$request->adresse,
            'tel'=>$request->tel,
            'email'=>$request->email,
            'mail_old'=>$request->mail_old,
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
                    return redirect()->route('admin.admin.index');
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
    public function update_admin_password($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'admin_update_password/'.$id, [
            'ancienpassword'=>$request->ancienpassword,
            'password'=>$request->password,
            'conf_password'=>$request->conf_password,

        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __($data['message']) );
                    return redirect()->route('admin.admin.edit',$id);
                }
                else{
                    Session::flash('error',  __($data['message']) );
                    return redirect()->route('admin.admin.edit',$id);
                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_admin(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'admin_delete', [
            'champ_id'=>$request->champ_id,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('admin.admin.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
