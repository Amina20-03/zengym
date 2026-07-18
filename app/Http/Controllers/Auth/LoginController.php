<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use App\Models\Instructeur;

use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Hash;

use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Session;



class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = RouteServiceProvider::HOME;



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }



    public function login(Request $request)

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

//                    dd([

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

            ]);

            if($data['user']['admin_id']){

                session([

                    'abonnement' => true,

                    'admin_id' => $data['user']['admin_id'],

                ]);

                return view('admin.dashboard.dashboard_component');

            }

            elseif($data['user']['instructeur_id']){

                session([

                    'code_instr' => DB::table('instructeurs')->where('id',$data['user']['instructeur_id'])->value('code_instr'),

                ]);

                foreach ($data['user']['abonnements'] as $abonnement) {

                    if ($abonnement['active']){

                        

                        if(($abonnement['date_deb']<= date('Y-m-d')) && ($abonnement['date_fin']>= date('Y-m-d')) && ($abonnement['status_paie'])){

                            session([

                                'abonnement' => true,

                                'instructeur_id' => $data['user']['instructeur_id'],

                                'categorie_instructeur' => $data['categorie_instructeur'],

                            ]);



                        }

                        else{

                            session([

                                'abonnement' => false,

                                'instructeur_id' => $data['user']['instructeur_id'],

                                'categorie_instructeur' => $data['categorie_instructeur'],

                            ]);

                        }

                        return view('instructeur.dashboard.dashboard_component');

                    }

                }



            }

            elseif($data['user']['candidat_id']){

                session([

                    'code_instr' => DB::table('instructeurs')->where('id',

                        DB::table('candidats')->where('id',$data['user']['candidat_id'])->value('instructeur_id')

                    )->value('code_instr'),

                    'abonnement' => true,

                    'candidat_id' => $data['user']['candidat_id'],

                ]);

                return view('candidat.dashboard.dashboard_component');

            }



            else{

                Session::flash('error', 'Vous n"avez pas un compte !');

                return redirect()->back();

            }

        }



        else{

            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');

            return redirect()->back();

        }

    }

    public function logout(Request $request)

    {

        $response = Http::withHeaders([

            'Accept' => 'application/json',

            'Authorization' => 'Bearer ' . session('TOKEN'),



        ])->get(env('API_URL').'logout');



        $data = $response->json();



        session()->flush();



        return view('welcome');

    }

}

