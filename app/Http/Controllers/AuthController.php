<?php

namespace App\Http\Controllers;

use App\Interfaces\LoginInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private LoginInterface $AuthInterface;

    public function __construct(LoginInterface $AuthInterface)
    {
        $this->AuthInterface = $AuthInterface;
    }


    public function login(Request $request)
    {

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $users = User::where('username', $request->username)->first();

        if ($this->AuthInterface->login($data)) {
            if ($users->status == 1) {
                return redirect()->route('admin_dashboard');
            }

            return redirect()->route('users_section.user_dashboard', [
                'user' => $users
            ]);
        } else {
            return back()->with('error', 'nom d\'utilisateur ou mot de passe incorrect');
        }
        
        // try {
        // } catch (\Exception $ex) {
        //     return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        // }
    }
}
