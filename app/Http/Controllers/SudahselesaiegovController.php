<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class SudahselesaiegovController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[8]);
        })->orderBy('id', 'desc')->get(); 
        return view('backend.layanans.index', compact('layanans'));
        
    }
}
