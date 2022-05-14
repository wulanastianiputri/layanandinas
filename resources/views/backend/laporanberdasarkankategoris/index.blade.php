@extends('backend.layouts.master', ['title' => 'Laporan Berdasarkan Kategori'])
@section('title','Laporan')
    

@section ('content')
<div class="section-header">
  <h1>Rekap Laporan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/laporanberdasarkankategoris">Laporan Berdasarkan Kategori</a></div>
    </div>
</div>

<div class="display">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h5>
        Berdasarkan Kategori
      </h5>
    </section>

<div class="card">
  <div class="card-body">
    <div class="row pl-1 pr-1 mb-3">
      <div class="col-md-6"> 
          <form action="{{route('laporanberdasarkankategoris.filterkategori')}}" name="filterkategori" id="filterkategori" method="get">
            @csrf
              <div class="input-group">
                <label for="namakategori" class="col-sm-5-3 control-label">Kategori</label>
                <div class="col-sm-9">
                  <select class="form-control" name="kategori" required="">
                    @foreach($kategories as $kategori)
                      <option value="{{$kategori->id}}" {{ $kategori->namakategori === $kategori->id ? "selected" : ""}}->{{$kategori->namakategori}}</option>
                    @endforeach
                      <option value="semuakategori">Semua Kategori</option>
                  </select>
                  @if ($errors->has('namakategori'))
                    <span class="help-block">
                      <strong>{{ $errors->first('namakategori') }}</strong>
                    </span>
                  @endif
                </div>
              <span class="input-group-append">
                <button href="{{route('layanans.index')}}" id="pilih" type="submit" class="btn btn-light" >Pilih</button>
              </span>   
            </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="row">
        <form action="{{route('laporanberdasarkankategoris.exportpdf')}}" method="get">
          <!-- <input type="hidden" name="kategori" value="{{$export}}" ></input> -->
          <!-- <a href="{{route('laporanberdasarkankategoris.exportpdf')}}" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
          <button class="btn btn-icon icon-left btn-success" name="kategori" value="{{$export}}" style="margin-left:245px;"><i class="far fa-file-pdf"></i>Export PDF</button>
        </form>  
        <form action="{{route('laporanberdasarkankategoris.exportexcel')}}" method="get">
          <!-- <input type="hidden" name="kategori" value="{{$export}}" ></input> -->
          <!-- <a href="{{route('laporanberdasarkankategoris.exportexcel')}}" class="btn btn-icon icon-left btn-success" style="margin:10px;" ><i class="far fa-file-excel"></i>Export Excel</a> -->
          <button class="btn btn-icon icon-left btn-success" name="kategori" value="{{$export}}" style="margin-left:10px;"><i class="far fa-file-excel"></i>Export Excel</button>
        </form>   
        </div>  
      </div>  
   </div>
    <!--End Pilihan Status-->


    
    <!-- Main content -->
    <section class="content">
      <div class="col-xs-12">
          <div class="row">
          <div class="col-12 col-md-12 col-lg-12">   
            
                <table class="table table-striped table-bordered table-sm" id="tabel-data">
                  <thead>
                      <tr>
                        <th>Perangkat Daerah</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Judul</th>
                        <!-- <th>Foto</th>-->
                      </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($laporanberdasarkankategoris as $laporanberdasarkankategori)
                    <tr>
                      <td>{{ $laporanberdasarkankategori->pd ['namapd'] }}</td>
                      <td>{{ $laporanberdasarkankategori->kategori ['namakategori'] }}</td>
                      <td>{{ $laporanberdasarkankategori->status ['namastatus'] }}</td>
                      <td>{{ $laporanberdasarkankategori->judul }}</td>
                      {{-- <!-- <td class="py-1">
                        @if ($laporanberdasarkankategori->layanan ['foto'])
                          <img src="{{url('images/layanan/'. $laporanberdasarkankategori->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
                        @else
                          <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                        @endif
                      </td> --> --}}
                    </tr>
                    @endforeach
                  </tbody>
              </table>
               
                </div>
            </div>
      </section>
  </div>
</div>
@endsection
@push('page-scripts')
  
@endpush

    
                  