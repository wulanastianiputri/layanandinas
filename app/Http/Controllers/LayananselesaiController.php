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
use Illuminate\Support\Facades\Auth;

class LayananselesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pd_id=Auth::user()->pd_id;
        $layanans = Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->whereIn('status_id', [5,8]);
        })->get();
        return view('backend.layanans.index', compact('layanans'));
       
    }


}


