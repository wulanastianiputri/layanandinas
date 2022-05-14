<?php

namespace App\Exports;

use App\Layanan;
use App\Perangkatdaerah;
use App\Kategori;
use App\Laporanberdasarkankategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class PermintaanlayananExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Layanan::all();
//     }
// }


class LaporanberdasarkankategoriexcelExport implements FromView
{
    // public function view(): View
    // {
    //     return view('backend.laporanberdasarkankategoris.exportexcel', [
    //         'laporanberdasarkankategoris' => Layanan::all()
    //     ]);
    // }

    //use Exportable; //menambahkan tipe excel yang akan didownload cth:csv file yang telah didownload akan tersimpan dmn
    
    
    public function view(): View
    {
        $filterkategori = request()->get('kategori'); //

        // dd($filterkategori);
        if($filterkategori == 'semuakategori'){  
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
           
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori', 'status')->where('status_id', $filterstatus)->get(); //mengambil nilai berdasarkan id status untuk filter status
        }

        return view('backend.laporanberdasarkankategoris.exportexcel', [
            'laporanberdasarkankategoris' => $laporanberdasarkankategoris 
        ]);        
    }
}