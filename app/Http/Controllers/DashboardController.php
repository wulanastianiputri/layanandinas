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


class DashboardController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $layanans = Layanan::get();
    //     $users  = User::get();
	// 	$pds   = Pd::get();
    //     $bidangs   = Bidang::get();		
    //     //if(Auth::user()->level === 'Super Admin')
    //     {
    //         $datalayanans = Layanan::where('status_id','=','1,2,3,4')
    //                             ->get();
    //         $datausers = User::count()
    //                             ->get();	
	// 		$datapds = Pd::count()
    //                             ->get();				
    //    // } else {
    //         $datalayanans = Layanan::orderBy('permintaanlayanan_id')->get();
    //         $datapds = Pd::orderBy('pd_id')->get();	
	// 		$datausers =user::orderBy('user_id')->get();
    //     }
		
    //     return view('home.index', compact('layanans','users','pds','bidangs'));
    // }

    public function index()
    {
        $layanans = Layanan::with('pd','kategori');
        return view('home', compact('layanans'));
        
    }
}
