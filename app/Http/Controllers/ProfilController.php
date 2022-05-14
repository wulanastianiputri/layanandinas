<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('pd','level')->get();
        return view('backend.profil.index', compact('users'));
        
    }
}