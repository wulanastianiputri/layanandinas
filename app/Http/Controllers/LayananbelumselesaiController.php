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

class LayananbelumselesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pd_id=Auth::user()->pd_id;
    if(Auth::user()->pd_id!= 11){ 
        $layanans = Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->whereIn('status_id', [1, 2, 3,4,7]);
        })->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $layanans = Layanan::with('pd','kategori')->whereIn('status_id', [1, 2, 3,4,6,7])->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $layanans = Layanan::with('pd','kategori')->whereIn('status_id', [1, 2, 3,4,6,7])->orderBy('id', 'desc')->get();  
    }
        return view('backend.layanans.index', compact('layanans'));
    }

  
           
}


