<?php

namespace App\Exports;

use App\Layanan;
use App\Perangkatdaerah;
use App\Kategori;
use Illuminate\Support\Facades\Auth;
use App\Laporanberdasarkanstatus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
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


class LaporanberdasarkanstatusexcelExport implements FromView
{
    public function view(): View
    {
        $filterstatus = request()->get('status'); //

        // dd($filterkategori);

        if($filterstatus == 'semuastatus'){
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
            // $laporanberdasarkanstatuss = Laporanberdasarkanstatus::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->get();   //menampilkan semua status yang ada pada datatable index laporanberdasarkanstatus

        } else { //selainnya
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

        return view('backend.laporanberdasarkanstatuss.exportexcel', [
            'laporanberdasarkanstatuss' => $laporanberdasarkanstatuss 
        ]);        
    }
}