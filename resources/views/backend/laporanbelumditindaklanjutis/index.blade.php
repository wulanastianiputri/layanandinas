@extends('backend.layouts.master', ['title' => 'Laporan Berdasarkan Tanggal'])
@section('title','Laporan')
    

@section ('content')
<div class="section-header">
  <h1>Laporan Berdasarkan Tanggal</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/laporanbelumditindaklanjutis">Laporan Berdasarkan Tanggal</a></div>
    </div>
</div>

<div class="display">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h5>
        Berdasarkan Tanggal
      </h5>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row">
                <div class="col-md-6">
              <div class="input-group md-6">
                <label for="label"> Tanggal Awal &nbsp;:&nbsp;&nbsp;&nbsp;</label>
                <input type="date" name="tglawal" id="tglawal" class="form-control"/>
              </div>
                </div>
              <div class="col-md-6">
              <div class="input-group md-6">
                <label for="label"> Tanggal Akhir &nbsp;:&nbsp;&nbsp;&nbsp;</label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
              </div>
              </div>
          </div>
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                <a href="" onclick="this.href='cetakpertanggal/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-icon icon-left btn-success" style="margin-left:850px; margin-top:10px; margin-bottom:20px"><i class="far fa-file-pdf"></i>Export PDF</a> 
              {{-- <a href="{{route('laporanbelumditindaklanjutis.exportexcel')}}" class="btn btn-icon icon-left btn-success" style="margin-top:10px; margin-bottom:20px" ><i class="far fa-file-excel"></i>Export Excel</a> 625--}}
              {{-- <form action="{{route('laporanbelumditindaklanjutis.exportexcel')}}" method="get"> --}}
                {{-- <!-- <input type="hidden" name="kategori" value="{{$export}}" ></input> --> --}}
                <!-- <a href="" class="btn btn-icon icon-left btn-success" style="margin:10px;" ><i class="far fa-file-excel"></i>Export Excel</a> -->
                {{-- <button class="btn btn-icon icon-left btn-success" name="tanggal" value="{{$export}}" style="margin-left:10px;"><i class="far fa-file-excel"></i>Export Excel</button> --}}
              {{-- </form>    --}}
              {{-- <a action="{{route('laporanbelumditindaklanjutis.exportexcel')}}" method="get" value="{{$export}}" class="btn btn-icon icon-left btn-success" style="margin-top:10px; margin-bottom:20px" ><i class="far fa-file-excel"></i>Export Excel</a>  --}}
            </div>  
            </div>
              <table class="table table-striped table-bordered table-sm" id="tabel-data">
                <thead>
                    <tr>
                      <th>Perangkat Daerah</th>
                      <th>Kategori</th>
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                
                  @foreach ($laporanbelumditindaklanjutis as $laporanbelumditindaklanjuti)
                  <tr>
                    <td>{{ $laporanbelumditindaklanjuti->pd ['namapd'] }}</td>
                    <td>{{ $laporanbelumditindaklanjuti->kategori ['namakategori'] }}</td>
                    <td>{{ $laporanbelumditindaklanjuti->judul }}</td>
                    <td>{{ $laporanbelumditindaklanjuti->status["namastatus"]}}</td>
                    {{--<td class="py-1">
                      @if ($laporanbelumditindaklanjuti->layanan ['foto'])
                        <img src="{{url('images/layanan/'. $laporanbelumditindaklanjuti->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @else
                        <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @endif
                    </td>--}}
                    <td>{{$laporanbelumditindaklanjuti->tanggal }}</td>
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