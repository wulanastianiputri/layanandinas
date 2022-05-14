<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Status;
use App\Layanan;
use App\Laporanberdasarkanstatus;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporanberdasarkanstatusexcelExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF; //untuk dompdf yang sudah di simpan pada config/app pada class facade

class LaporanberdasarkanstatussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Status $statuss, Perangkatdaerah $pds, Kategori $kategories)
    {
        $export = '';
        $pds = Perangkatdaerah::orderBy('namapd')->get();		
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get();
        
        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
        }

        // $laporanberdasarkanstatuss =  Laporanberdasarkanstatus::with('pd','status')->get();
  
        return view('backend.laporanberdasarkanstatuss.index',['export' => $export], 
        compact('laporanberdasarkanstatuss','pds','kategories','statuss'));
    }

    //filter status
    public function filterstatus(Request $request, Status $statuss, Perangkatdaerah $pds, Kategori $kategories)
    {
        $export = $request->get('status');
        // dd($filterstatuss);
        $pds = Perangkatdaerah::orderBy('namapd')->get();		
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get(); //Urutkan dulu berdasarkan kolom namastatus pada database status
        $filterstatus = $request->get('status'); // mengambil dan menampilkan nilai berdasarkan nama status pada pilihan filter status
        
        if($request->get('status') == 'semuastatus'){   
            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
            }
            //$laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->get();
        
        } else {

            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)
                ->where(function ($query) {
                    $query->where('pd_id',Auth::user()->pd_id);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();  
            }
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->where('status_id', $filterstatus)->get(); //mengambil nilai berdasarkan id status untuk filter status
        }

        //$layanans=DB::table('layanan')->where('judul','like','%'.$search.'%')->paginate(2);
        return view('backend.laporanberdasarkanstatuss.index',['export' => $export], compact('laporanberdasarkanstatuss','pds','kategories','statuss'));
        // return view('backend.laporanberdasarkanstatuss.index', ['exportpdf' => $exportpdf]);
        
    }

    // export excel
    public function exportexcel(Request $request) 
    {
        //dd($filterstatus);
        $export = $request->get('status');
        // dd($filterstatuss);
        $pds = Perangkatdaerah::orderBy('namapd')->get();		
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get(); //Urutkan dulu berdasarkan kolom namastatus pada database status
        $filterstatus = $request->get('status'); // mengambil dan menampilkan nilai berdasarkan nama status pada pilihan filter status
        
        if($request->get('status') == 'semuastatus'){   
            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
            }
            //$laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->get();
        
        } else {

            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)
                ->where(function ($query) {
                    $query->where('pd_id',Auth::user()->pd_id);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();  
            }
           
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->where('status_id', $filterstatus)->get(); //mengambil nilai berdasarkan id status untuk filter status
        }
        return Excel::download(new LaporanberdasarkanstatusexcelExport, 'Laporan Berdasarkan Status.xlsx');
    }

    // export pdf
    public function exportpdf(Request $request) 
    {
        $filterstatus = $request->get('status');
        
        //$filterstatus = $request->status;
        if($filterstatus == 'semuastatus'){ //jika dropdown list = semua status
            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
            }
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->get();  

        } else {
            if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)
                ->where(function ($query) {
                    $query->where('pd_id',Auth::user()->pd_id);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [1,3])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get(); 
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [4,7])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->where('kategori_id', [8])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
                $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->whereBetween('kategori_id', [9,12])
                ->where(function ($query) {
                    $query->whereIn('status_id',[2,4,7,8]);
                })->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();
            } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
                $laporanberdasarkanstatuss= Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id', $filterstatus)->orderBy('id', 'desc')->get();  
            }
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id','like','%'.$filterstatus.'%')
            // ->where(function ($query) {
            //             $query->where('pd_id',Auth::user()->pd_id);
            //         })->orderBy('id', 'desc')->get(); 

        }
        
        $pdf = PDF::loadView('backend.laporanberdasarkanstatuss.exportpdf', ['laporanberdasarkanstatuss' => $laporanberdasarkanstatuss]);
        return $pdf->download('Laporan Berdasarkan Status.pdf');
        
                
    }

}
