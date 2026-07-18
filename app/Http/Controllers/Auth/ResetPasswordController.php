<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/login';

    /**
     * Override resetPassword pour mettre à jour via la même DB que le WS
     */
    protected function resetPassword($user, $password)
    {
        // Mettre à jour directement dans la DB partagée
        DB::table('users')
            ->where('email', $user->email)
            ->update([
                'password'       => Hash::make($password),
                'remember_token' => \Illuminate\Support\Str::random(60),
            ]);
    }

    /**
     * Override redirect après reset
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return redirect()->route('login')
            ->with('success', 'Mot de passe réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
    }
}
