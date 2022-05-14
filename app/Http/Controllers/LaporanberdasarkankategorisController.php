<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Status;
use App\Layanan;
use App\Laporanberdasarkankategori;
use App\Laporanberdasarkanstatus;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporanberdasarkankategoriexcelExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF; //untuk dompdf yang sudah di simpan pada config/app pada class facade

class LaporanberdasarkankategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request, Status $statuss, Perangkatdaerah $pds, Kategori $kategories)
    {
        $export = ''; //menampilkan button export pdf dan export excel dengan value $export pada index laporanberdasarkankategoris
        $pds = Perangkatdaerah::orderBy('namapd')->get(); 
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get();

     
        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
        }
      
        return view('backend.laporanberdasarkankategoris.index',['export' => $export], 
        compact('laporanberdasarkankategoris','pds','kategories','statuss'));
    }

    //filter kategori
    public function filterkategori(Request $request, Status $statuss, Perangkatdaerah $pds, Kategori $kategories)
    {
        $export = $request->get('kategori');
        
        $pds = Perangkatdaerah::orderBy('namapd')->get();		
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get();
        $filterkategori = $request->get('kategori'); // mengambil dan menampilkan nilai berdasarkan nama status pada pilihan filter status
      

if($request->get('kategori') == 'semuakategori'){   
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
        $laporanberdasarkankategoris= Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)
        ->where(function ($query) {
            $query->where('pd_id',Auth::user()->pd_id);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $laporanberdasarkankategoris= Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $laporanberdasarkankategoris= Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->orderBy('id', 'desc')->get();  
    }
    // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->where('status_id', $filterstatus)->get(); //mengambil nilai berdasarkan id status untuk filter status
}

//$layanans=DB::table('layanan')->where('judul','like','%'.$search.'%')->paginate(2);
return view('backend.laporanberdasarkankategoris.index',['export' => $export], compact('laporanberdasarkankategoris','pds','kategories','statuss'));
// return view('backend.laporanberdasarkanstatuss.index', ['exportpdf' => $exportpdf]);

}

// export excel
public function exportexcel(Request $request) 
{
//dd($filterstatus);
$export = $request->get('kategori');
// dd($filterstatuss);
$pds = Perangkatdaerah::orderBy('namapd')->get();		
$kategories = Kategori::orderBy('namakategori')->get();
$statuss = Status::orderBy('namastatus')->get(); //Urutkan dulu berdasarkan kolom namastatus pada database status
$filterkategori = $request->get('kategori'); // mengambil dan menampilkan nilai berdasarkan nama status pada pilihan filter status

if($request->get('kategori') == 'semuakategori'){   
    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $$laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {      
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
    }
    //$laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->get();

} else {

    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)
        ->where(function ($query) {
            $query->where('pd_id',Auth::user()->pd_id);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('status_id', $filterkategori)->orderBy('id', 'desc')->get();  
    }
   
    // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->where('status_id', $filterstatus)->get(); //mengambil nilai berdasarkan id status untuk filter status
}
return Excel::download(new LaporanberdasarkankategoriexcelExport, 'Laporan Berdasarkan Kategori.xlsx');
}

// export pdf
public function exportpdf(Request $request) 
{
$filterkategori = $request->get('kategori');

//$filterstatus = $request->status;
if($filterkategori == 'semuakategori'){ //jika dropdown list = semua status
    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $laporanberdasarkankategoris = Laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
    }
    // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->get();  

} else {
    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)
        ->where(function ($query) {
            $query->where('pd_id',Auth::user()->pd_id);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $laporanberdasarkankategoris = laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $laporanberdasarkankategoris= laporanberdasarkankategori::with('pd','kategori','status')->where('kategori_id', $filterkategori)->orderBy('id', 'desc')->get();  
    }
    // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('status_id','like','%'.$filterstatus.'%')
    // ->where(function ($query) {
    //             $query->where('pd_id',Auth::user()->pd_id);
    //         })->orderBy('id', 'desc')->get(); 

}

$pdf = PDF::loadView('backend.laporanberdasarkankategoris.exportpdf', ['laporanberdasarkankategoris' => $laporanberdasarkankategoris]);
return $pdf->download('Laporan Berdasarkan Kategori.pdf');

        
}

}

