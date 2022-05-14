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

class LayanansbelumdiverifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanans = Layanan::with('pd','kategori','status')->where('status_id','like','1')->latest()->paginate(2000);
        return view('backend.layanans.belumdiverifikasi', compact('layanans'));
    }

    public function layanangabunganverifikator()
    {
        $layanans = Layanan::with('pd','kategori','status')->where('status_id','like','1')->orwhere('status_id','like','2')->orwhere('status_id','like','3')->orwhere('status_id','like','4')->orwhere('status_id','like','5')->orwhere('status_id','like','6')->latest()->paginate(2000);
        return view('backend.layanans.indexs', compact('layanans'));
    }
    
}


