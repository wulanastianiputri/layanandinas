<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Status;
use App\Layanan;
use App\Jawaban;
use App\Laporanbelumditindaklanjuti;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LayanansbelumditindaklanjutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $layanans= Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $layanans= Layanan::with('pd','kategori')->where('status_id','1')->orwhere('status_id','2')->orwhere('status_id',6)->orderBy('id', 'desc')->get();    
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $layanans= Layanan::with('pd','kategori')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->where('status_id', [2]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $layanans= Layanan::with('pd','kategori')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->where('status_id', [2]);
            })->orderBy('id', 'desc')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $layanans= Layanan::with('pd','kategori')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->where('status_id', [2]);
            })->orderBy('id', 'desc')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $layanans= Layanan::with('pd','kategori')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->where('status_id', [2]);
            })->orderBy('id', 'desc')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $layanans= Layanan::with('pd','kategori')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $layanans= Layanan::with('pd','kategori')->orderBy('id', 'desc')->get();  
        }
        // $layanans = Layanan::with('pd','kategori','status')->where('status_id','like','2')->latest()->paginate(2000);
        return view('backend.layanans.index', compact('layanans'));
    }

    public function layanangabunganbidang()
    {
        $layanans = Layanan::with('pd','kategori')->where('status_id','like','2')->orwhere('status_id','like','3')->orwhere('status_id','like','4')->orwhere('status_id','like','5')->orwhere('status_id','like','6')->latest()->paginate(2000);
        return view('backend.layanans.index', compact('layanans'));
    }
   
   
   
  
}


