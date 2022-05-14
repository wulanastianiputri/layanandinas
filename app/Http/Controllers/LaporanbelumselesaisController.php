<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Layanan;
use App\Laporanbelumselesai;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use App\Exports\LaporanbelumselesaiexcelExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF; //untuk dompdf yang sudah di simpan pada config/app pada class facade

class LaporanbelumselesaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanbelumselesais = Laporanbelumselesai::with('pd','kategori')->get();
        return view('backend.laporanbelumselesais.index', compact('laporanbelumselesais'));
    }

    // export excel
    public function exportexcel() 
    {
        return Excel::download(new LaporanbelumselesaiexcelExport, 'Laporan Belum Selesai.xlsx');
    }

    // export pdf
    public function exportpdf() 
    {
        $laporanbelumselesais = Layanan::all();
        $pdf = PDF::loadView('backend.laporanbelumselesais.exportpdf', ['laporanbelumselesais' => $laporanbelumselesais]);
        return $pdf->download('Laporan Belum Selesai.pdf');
    }
}
