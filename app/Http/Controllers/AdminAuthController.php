<?php

namespace App\Http\Controllers;

use App\Mail\userPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{


    public function registration(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users,email",
            "password" => "required|string|min:4|",
            "role" => "string|in:admin,user", 
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
          $user->role = $request->role; 

          try {

            if ($user->save()) {
                return redirect()->route('login')->with("success", "User successfully registered");
            } else {
                return back()->with("error", "Registration failed!");
            }

          } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
          }

       
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Vérification du rôle de l'utilisateur
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->intended(route('userdashboard'));
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    

 


    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|string|email|max:255|unique:users,email",
            "name" => "required|string|max:255",
        ]);

        // Générer un mot de passe aléatoire
        $password = $this->RandomPassword();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if ($user->save()) {
            // Envoyer le mot de passe par email
            Mail::to($user->email)->send(new userPasswordEmail($user->email, $password));

            return redirect()->route('login')->with("success", "l'utilsateur est enregisté avec succès");
        } else {
            return back()->with("error", "echec d'inscription!");
        }
    }

    
    private function RandomPassword($length = 8)
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()'), 0, $length);
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
        return view("users.edit", [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;


        if ($user->save()) {
            return redirect()->route('login')->with("success", "User successfully registered");
        } else {
            return back()->with("error", "Registration failed!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with("success", "utilisateur supprimée");
    }
}
