<?php

namespace App\Exports;

use App\Layanan;
use App\Perangkatdaerah;
use App\Kategori;
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


class LaporanbelumselesaiexcelExport implements FromView
{
    public function view(): View
    {
        return view('backend.laporanbelumselesais.exportexcel', [
            'laporanbelumselesais' => Layanan::all()
        ]);
    }
}