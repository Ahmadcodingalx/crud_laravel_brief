<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {

        return view('admin_dashboard');
    }

    public function profil()
    {

        return view('users_section.profil');
    }

    public function admin_profil()
    {

        return view('admin_profil');
    }

    public function users_show()
    {

        $users = User::all();
        // $data = $this->productInterface->index();

        return view('users_section.index', [
            // 'page' => 'products',
            // 'products' => $data,
            "users" => $users
        ]);
    }

    public function logout()
    {
        // return view('admin_login');
        Auth::logout();
        return redirect('/');
    }

    public function users_index()
    {
        return view('users_section.user_dashboard');
        // Auth::logout();
        // return redirect('/');
    }
}
