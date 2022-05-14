@extends('backend.layouts.master', ['title' => 'Laporan Berdasarkan Status'])
@section('title','Laporan')
    

@section ('content')
<div class="section-header">
  <h1>Rekap Laporan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/laporanberdasarkanstatuss">Laporan Berdasarkan Status</a></div>
    </div>
</div>

<div class="display">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h5>
        Berdasarkan Status
      </h5>
    </section>

<div class="card">
  <div class="card-body">
    <div class="row pl-1 pr-1">
      <div class="col-md-6"> 
        <form action="{{route('laporanberdasarkanstatuss.filterstatus')}}" name="filterstatus" id="filterstatus" method="get">
          @csrf
            <div class="input-group">
              <label for="namastatus" class="col-sm-5-3 control-label">Status</label>
              <div class="col-sm-9">
                <select class="form-control" name="status" required="">
                  @foreach($statuss as $status)
                    <option value="{{$status->id}}" {{ $status->namastatus === $status->id ? "selected" : ""}}->{{$status->namastatus}}</option> 
                  @endforeach
                    <option value="semuastatus">Semua Status</option>
                </select>
                @if ($errors->has('namastatus'))
                  <span class="help-block">
                    <strong>{{ $errors->first('namastatus') }}</strong>
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
        <form action="{{route('laporanberdasarkanstatuss.exportpdf')}}" method="get">
          <!-- <input type="hidden" name="kategori" value="{{$export}}" ></input> -->
          <!-- <a href="{{route('laporanberdasarkanstatuss.exportpdf')}}" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
          <button class="btn btn-icon icon-left btn-success" name="status" value="{{$export}}" style="margin-left:245px;"><i class="far fa-file-pdf"></i>Export PDF</button>
        </form>  
        <form action="{{route('laporanberdasarkanstatuss.exportexcel')}}" method="get">
          <!-- <input type="hidden" name="kategori" value="{{$export}}" ></input> -->
          <!-- <a href="{{route('laporanberdasarkanstatuss.exportexcel')}}" class="btn btn-icon icon-left btn-success" style="margin:10px;" ><i class="far fa-file-excel"></i>Export Excel</a> -->
          <button class="btn btn-icon icon-left btn-success" name="status" value="{{$export}}" style="margin-left:10px;"><i class="far fa-file-excel"></i>Export Excel</button>
        </form>   
        </div>  
      </div>  
   </div>
    
    <!--End Pilihan Status-->

    <!-- Main content -->
    <section class="content mt-3">
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
                  
                    @foreach ($laporanberdasarkanstatuss as $laporanberdasarkanstatus)
                    <tr>
                      <td>{{ $laporanberdasarkanstatus->pd ['namapd'] }}</td>
                      <td>{{ $laporanberdasarkanstatus->kategori ['namakategori'] }}</td>
                      <td>{{ $laporanberdasarkanstatus->status ['namastatus'] }}</td>
                      <td>{{ $laporanberdasarkanstatus->judul }}</td>
                      {{-- <!-- <td class="py-1">
                        @if ($laporanberdasarkanstatus->layanan ['foto'])
                          <img src="{{url('images/layanan/'. $laporanberdasarkanstatus->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
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