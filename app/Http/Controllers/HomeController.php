<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AnnonceDechet;

class HomeController extends Controller
{


// Ce code vérifie la redirection lorsque l'utilisateur authentifié accède à la racine (/), en le redirigeant selon son rôle. S'il n'est pas connecté, il est renvoyé à la page de connexion.
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user(); // Get the authenticated user


            // Check if the user is blocked
            if ($user->is_blocked) {
                // Redirect blocked users to a specific route, e.g., 'blocked' page or logout
                return redirect()->route('front.showPlans')->with('error', 'Your account is blocked.');
            }

            // Check the user's role
            if (in_array($user->role, ['Responsable_Centre', 'Responsable_Entreprise', 'admin'])) {
                // If the user is an admin or responsible, show the back office dashboard
                return redirect()->route('dashboard');

            } elseif ($user->role === 'user') {
                // If the user is a regular user, show the front office home
                return redirect()->route('FrontHome');

            } else {
                // Handle other roles if necessary
                return redirect()->route('login'); // Redirect to login for unknown roles
            }
        } else {
            // If the user is not authenticated, redirect to the login route
            return redirect()->route('login');
        }
    }
}
