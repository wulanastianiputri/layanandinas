<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Status;
use App\Layanan;
use App\Jawaban;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class sudahverifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->whereIn('status_id',[2,3,5,6])->get();
         return view('backend.layanans.index', compact('layanans'));
        
    }


}


