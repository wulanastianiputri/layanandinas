<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Layanan;
use App\Laporanbelumditindaklanjuti;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporanbelumditindaklanjutiexcelExport;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Maatwebsite\Excel\Facades\Excel;
use PDF; //untuk dompdf yang sudah di simpan pada config/app pada class facade

class LaporanbelumditindaklanjutisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();  
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $laporanbelumditindaklanjutis= Laporanbelumditindaklanjuti::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
        }
        // $laporanbelumditindaklanjutis = Laporanbelumditindaklanjuti::with('pd','kategori')->where('status_id' ,'<', 5)->get();
        return view('backend.laporanbelumditindaklanjutis.index', compact('laporanbelumditindaklanjutis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // export excel
    // public function exportexcel($tglawal, $tglakhir) 
    public function exportexcel() 
    {
      
       return Excel::download(new LaporanbelumditindaklanjutiexcelExport, 'Laporan Berdasarkan Tanggal.xlsx');
    }

    // export pdf
    public function exportpdf() 
    {
        //    $laporanbelumditindaklanjutis = Layanan::all();
        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();  
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $laporanbelumditindaklanjutis=Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $laporanbelumditindaklanjutis= Layanan::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
        }
        $pdf = DomPDF::loadView('backend.laporanbelumditindaklanjutis.exportpdf', ['laporanbelumditindaklanjutis' => $laporanbelumditindaklanjutis]);
        return $pdf->download('Laporan Berdasarkan Tanggal.pdf');
        }
    public function CetakbelumditindaklanjutiPertanggal($tglawal, $tglakhir){
       //dd("Tanggal Awal:".$tglawal, "Tanggal Akhir: ".$tglakhir);
    //    $cetakpertanggal = Layanan::with('pd','kategori')->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        $cetakpertanggal = Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        $cetakpertanggal = Layanan::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();  
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        $cetakpertanggal = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get(); 
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        $cetakpertanggal =Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        $cetakpertanggal = Layanan::with('pd','kategori','status')->where('kategori_id', [8])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        $cetakpertanggal = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
        })->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
    } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        $cetakpertanggal = Layanan::with('pd','kategori','status')->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
    } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        $cetakpertanggal = Layanan::with('pd','kategori','status')->whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();  
    }
       return view('backend.laporanbelumditindaklanjutis.exportpdf', compact('cetakpertanggal'));
    }
}
