<?php

namespace App\Http\Controllers;
use App\Pd;
use App\Status;
use App\Kategori;
use App\Layanan;


use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class homesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status');
        return view('home', compact('layanans'));
        // $layanans = Layanan::with('pd','kategori','users')->latest()->paginate(10);
        // return view('backend.layanans.index', compact('layanans'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}


