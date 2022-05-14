<?php

namespace App\Exports;

use App\Layanan;
use App\Perangkatdaerah;
use App\Kategori;
use App\Laporanbelumditindaklanjuti;
use Illuminate\Support\Facades\Auth;
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


class LaporanbelumditindaklanjutiexcelExport implements FromView
{
    public function view(): View
    {
               // dd($filterkategori);
        $laporanbelumditindaklanjutis = Layanan::all();
        if($laporanbelumditindaklanjutis == 'semuatanggal'){
            $laporanbelumditindaklanjutis = Laporanbelumditindaklanjuti::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->get();   //menampilkan semua status yang ada pada datatable index laporanberdasarkanstatus

        } else { //selainnya
            
            // $laporanbelumditindaklanjutis = Laporanbelumditindaklanjuti::with('pd','kategori','status')->whereBetween('tanggal',[$tglawal, $tglakhir])
            // ->where(function ($query) {
            //             $query->where('pd_id',Auth::user()->pd_id);
            //         })->orderBy('id', 'desc')->get(); 
        }

        return view('backend.laporanbelumditindaklanjutis.exportexcel', [
            'laporanbelumditindaklanjutis' => $laporanbelumditindaklanjutis
        ]);        
    }
}