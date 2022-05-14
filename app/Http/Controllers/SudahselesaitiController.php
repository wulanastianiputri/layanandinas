<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class SudahselesaitiController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[8]);
        })->orderBy('id', 'desc')->get();;
        return view('backend.layanans.index', compact('layanans'));
        
    }
}
