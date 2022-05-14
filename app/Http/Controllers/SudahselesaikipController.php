<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class SudahselesaikipController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[8]);
        })->orderBy('id', 'desc')->get();
        return view('backend.layanans.index', compact('layanans'));
        
    }
}
