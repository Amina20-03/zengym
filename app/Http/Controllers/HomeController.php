<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('admin.dashboard.dashboard_component');
    }
    public function agentHome()
    {
        $id_branche = DB::table('employe')->where('IDemploye',auth()->user()->IDemploye)->value('id_branche_soc');
        $adherant_count = DB::table('client')->where('id_branche_soc',$id_branche)->count();
        $abo_count = DB::table('ventesallesport')->where('id_branche_soc',$id_branche)->count();
        $abo_non_solde_count = DB::table('ventesallesport')->where('Solder_vente',false)->where('id_branche_soc',$id_branche)->count();
        $reg_count = DB::table('employe_reglement')->where('IDEMPLOYE',auth()->user()->IDemploye)->count();
        return view('agent.dashboard.dashboard_component',[
            'adherant_count' => $adherant_count,
            'abo_count' => $abo_count,
            'abo_non_solde_count' => $abo_non_solde_count,
            'reg_count' => $reg_count,
        ]);
    }
}
