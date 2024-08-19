<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Mail\OtpCodeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes\ResponseClass;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users_section.create_user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'status' => 0,
            'if_update' => 0,
        ];

        DB::beginTransaction();

        
        DB::commit();
        
        
        $otpCode = [
            'email' => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'if_update' => 0,
        ];
        
        Mail::to($request->email)->send(new OtpCodeEmail($request->name, $otpCode['password'], $otpCode['username'], $otpCode['if_update']));
        
        try {
            $this->userInterface->store($data);

            return back()->with('success', 'Utilisateur créer avec succès.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users_section.edit_user', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $otpCode = [
            'email' => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'name' => $request->name,
            'if_update' => 1,
        ];
        
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->if_update = 1;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['new_password'])) {
                $otpCode = [
                    'email' => $request->email,
                    'password' => $request->password,
                    'username' => $request->username,
                    'if_update' => 2,
                ];
                $user->password = Hash::make($request->password);
            }
        }
        
        Mail::to($request->email)->send(new OtpCodeEmail($request->name, $otpCode['password'], $otpCode['username'], $otpCode['if_update']));

        $user->save();

        return back()->with("success", "L'utilisateur a été modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        
        return back()->with("success", "L'utilisateur a été supprimé avec succès !");
    }
}
