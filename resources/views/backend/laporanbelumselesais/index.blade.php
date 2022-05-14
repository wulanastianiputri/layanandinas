@extends('backend.layouts.master', ['title' => 'Laporan Belum Selesai'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Laporan Belum Selesai</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/laporanbelumselesais">Laporan Belum Selesai</a></div>
    </div>
</div>

<div class="display">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Belum Selesai
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-xs-12">
          <div class="row">
          <div class="col-12 col-md-12 col-lg-12">     
              <a href="{{route('laporanbelumselesais.exportpdf')}}" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a>
              <a href="{{route('laporanbelumselesais.exportexcel')}}" class="btn btn-icon icon-left btn-success" style="margin:10px;" ><i class="far fa-file-excel"></i>Export Excel</a>
              <table class="table table-striped table-bordered table-sm" id="tabel-data">
                  <thead>
                      <tr>
                        <th>Perangkat Daerah</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <!-- <th>Foto</th>-->	
                      </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($laporanbelumselesais as $laporanbelumselesai)
                    <tr>
                      <td>{{ $laporanbelumselesai->pd ['namapd'] }}</td>
                      <td>{{ $laporanbelumselesai->kategori ['namakategori'] }}</td>
                      <td>{{ $laporanbelumselesai->judul }}</td>
                      {{-- <!-- <td class="py-1">
                        @if ($laporanbelumselesai->layanan ['foto'])
                          <img src="{{url('images/layanan/'. $laporanbelumselesai->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
                        @else
                          <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                        @endif
                      </td> --> --}}
                    </tr>
                    @endforeach
                  </tbody>
              </table>
                {{--$pds->links()--}}		
                </div>
            </div>
      </section>
  </div>
</div>
@endsection
@push('page-scripts')
    
  
    
@endpush