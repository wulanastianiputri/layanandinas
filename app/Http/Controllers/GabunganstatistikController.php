<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class GabunganstatistikController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
        return view('backend.layanans.index', compact('layanans'));
        
    }
}
