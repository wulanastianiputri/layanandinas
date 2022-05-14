@extends('backend.layouts.master', ['title' => 'Beranda'])
@section('grafik')

@section('content')

<div class="section-header">
  <h1>Beranda</h1>
</div>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    

    <!--Admin Perangkat daerah-->
    @if(Auth::user()->level_id==1)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('layanans.index') }}" >
            <div class="card-body">
              {{App\Layanan::where('pd_id',Auth::user()->pd_id)->count()}}
            </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Selesai</h4>
            </div>
            <a href="{{ route('layananbelumselesai.index') }}" >
            <div class="card-body"  >
              {{App\Layanan::
                where('pd_id',Auth::user()->pd_id)
                ->where(function ($query) {
                    $query->whereIn('status_id', [1, 2, 3,4,7]);
                })->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Selesai</h4>
            </div>
            <a href="{{ route('layananselesai.index') }}" >
            <div class="card-body">
              {{App\Layanan::
                where('pd_id',Auth::user()->pd_id)
                ->where(function ($query) {
                    $query->whereIn('status_id', [5,8]);
                })->count()}}  
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!----- verifikator-->

    @elseif(Auth::user()->level_id==2)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('gabunganverifikator.index') }}" >
            <div class="card-body">
              {{$layanan = App\Layanan::whereIn('status_id', [1, 2, 3,5,6])->count()}}
            </div>
           </a>
          </div>
        </div>
      </div>
    
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Diverifikasi</h4>
            </div>
            <a href="{{ route('layananbelumdiverifikasi.index') }}" >
            <div class="card-body">
              {{$layanan = App\Layanan::where('status_id','1')->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    
 
         
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Sudah Diverifikasi</h4>
            </div>
            <a href="{{ route('sudahverifikasi.index') }}" >
            <div class="card-body">
              {{$layanan = App\Layanan::whereIn('status_id', [2, 3,5,6])->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>

    </div>

    <!--bidang-->

    <!--contoh Bidangegov, levelid=3, kategori_id=1-3, status=2,4,7,8-->
    @elseif(Auth::user()->level_id==3)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('gabunganegov.index') }}" >
            <div class="card-body">
             {{$layanans = App\Layanan::
              whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->count()}}
            
             </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Selesai</h4>
            </div>
            <a href="{{ route('belumselesaiegov.index') }}" >
            <div class="card-body"  >
             
             {{$layanans = App\Layanan::
              whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7]);
            })->count()}}
           </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Selesai</h4>
            </div>
            <a href="{{ route('sudahselesaiegov.index') }}" >
            <div class="card-body">
               
             {{$layanans = App\Layanan::
              whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->where('status_id',[8]);
            })->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!--contoh Bidangti, levelid=4, kategori_id=4-7,status=2,4,7,8-->
    @elseif(Auth::user()->level_id==4)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('gabunganti.index') }}" >
            <div class="card-body">
             {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
             ->where(function ($query) {
                 $query->whereIn('status_id',[2,4,7,8]);
              })->count()}}
            
             </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Selesai</h4>
            </div>
            <a href="{{ route('belumselesaiti.index') }}" >
            <div class="card-body"  >
             
              {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
              ->where(function ($query) {
                  $query->whereIn('status_id',[2,4,7]);
               })->count()}}
           </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Selesai</h4>
            </div>
            <a href="{{ route('sudahselesaiti.index') }}" >
            <div class="card-body">
               
              {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
              ->where(function ($query) {
                  $query->whereIn('status_id',[8]);
               })->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    </div> 

    <!--contoh Bidangstatistik, levelid=5, kategori_id=8, status=2,4,7,8-->
    @elseif(Auth::user()->level_id==5)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('gabunganstatistik.index') }}" >
            <div class="card-body">
             {{$layanans = App\Layanan::with('pd','kategori','status')->where('kategori_id', [8])
             ->where(function ($query) {
                 $query->whereIn('status_id',[2,4,7,8]);
              })->count()}}
            
             </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Selesai</h4>
            </div>
            <a href="{{ route('belumselesaistatistik.index') }}" >
            <div class="card-body"  >
             
              {{$layanans = App\Layanan::with('pd','kategori','status')->where('kategori_id', [8])
             ->where(function ($query) {
                 $query->whereIn('status_id',[2,4,7]);
               })->count()}}
           </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Selesai</h4>
            </div>
            <a href="{{ route('sudahselesaistatistik.index') }}" >
            <div class="card-body">
               
              {{$layanans = App\Layanan::with('pd','kategori','status')->where('kategori_id', [8])
              ->where(function ($query) {
                  $query->whereIn('status_id',[8]);
               })->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
     </div>
 
    <!--contoh Bidangkip, levelid=6, kategori_id=9-12, status=2,4,7,8-->
    @elseif(Auth::user()->level_id==6)
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Tiket Layanan</h4>
            </div>
            <a href="{{ route('gabungankip.index') }}" >
            <div class="card-body">
             {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
        ->where(function ($query) {
            $query->whereIn('status_id',[2,4,7,8]);
              })->count()}}
            
             </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Belum Selesai</h4>
            </div>
            <a href="{{ route('belumselesaikip.index') }}" >
            <div class="card-body"  >
             
              {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
              ->where(function ($query) {
                  $query->whereIn('status_id',[2,4,7]);
               })->count()}}
           </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Layanan Selesai</h4>
            </div>
            <a href="{{ route('sudahselesaikip.index') }}" >
            <div class="card-body">
               
              {{$layanans = App\Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
              ->where(function ($query) {
                  $query->whereIn('status_id',[8]);
               })->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    @elseif(Auth::user()->level_id==7)
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-edit"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Perangkat Daerah</h4>
            </div>
            <a href="{{ route('pds.index') }}" >
            <div class="card-body">
              {{$pd = App\Perangkatdaerah::count()}}
            </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Total Layanan </h4>
            </div>
            <a href="{{ route('layanans.index') }}" >
            <div class="card-body"  >
              {{$layanan = App\Layanan::count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Belum Selesai</h4>
            </div>
            <a href="{{ route('layananbelumselesai.index') }}" >
            <div class="card-body">
              {{$layanan = App\Layanan::whereIn('status_id',[1,2,3,4,5,7])->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pengguna</h4>
            </div>
            <a href="{{ route('users.index') }}" >
            <div class="card-body">
              {{$user = App\User::count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    @elseif(Auth::user()->level_id==0)
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-edit"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Perangkat Daerah</h4>
            </div>
            <a href="{{ route('pds.index') }}" >
            <div class="card-body">
              {{$pd = App\Perangkatdaerah::count()}}
            </div>
           </a>
          </div>
        </div>
      </div>
    
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file-alt"></i>
          </div>
           <div class="card-wrap">
            <div class="card-header">
              <h4>Total Layanan </h4>
            </div>
            <a href="{{ route('layanans.index') }}" >
            <div class="card-body"  >
              {{$layanan = App\Layanan::count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
     
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Belum Selesai</h4>
            </div>
            <a href="{{ route('layananbelumselesai.index') }}" >
            <div class="card-body">
              {{$layanan = App\Layanan::whereIn('status_id',[1,2,3,4,6,7])->count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pengguna</h4>
            </div>
            <a href="{{ route('users.index') }}" >
            <div class="card-body">
              {{$user = App\User::count()}}
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    @endif

    @if(Auth::user()->level_id==1)
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatuspd"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartkategoripd"></div>
          </div>
        </div>
      </div>
    </div>
    @elseif(Auth::user()->level_id==2)
    <div class="row">
 
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatuspdv"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartbidangv"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card card-primary col-md-12">
        <div class="container">
          <div class="panel">
            <div id="chartkategoripdv"></div>
          </div>
        </div>
      </div>
    </div>
   
     
    @elseif(Auth::user()->level_id==3)
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatusegov"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartkategoriegov"></div>
          </div>
        </div>
      </div>
    </div>

    @elseif(Auth::user()->level_id==4)
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatusti"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartkategoriti"></div>
          </div>
        </div>
      </div>
    </div>
    

    @elseif(Auth::user()->level_id==5)
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatusstatistik"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartkategoristatistik"></div>
          </div>
        </div>
      </div>
    </div>

    @elseif(Auth::user()->level_id==6)
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatuskip"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartkategorikip"></div>
          </div>
        </div>
      </div>
    </div>
    

    @elseif(Auth::user()->level_id==7)
    <div class="row">
 
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatuspdv"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartbidang"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card card-primary col-md-12">
        <div class="container">
          <div class="panel">
            <div id="chartkategoripd"></div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartlayananpd"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartbelumditindaklanjutipd"></div>
          </div>
        </div>
      </div>
    </div> 
    @elseif(Auth::user()->level_id==0)
    <div class="row">
 
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartstatussuperadmin"></div>
          </div>
        </div>
      </div>
      <div class="card card-primary col-md-6">
        <div class="container">
          <div class="panel">
            <div id="chartbidangsuperadmin"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card card-primary col-md-12">
        <div class="container">
          <div class="panel">
            <div id="chartkategorisuperadmin"></div>
          </div>
        </div>
      </div>
    </div>
  
    @endif


    
<!-- Grafik  -->
<script src="https://code.highcharts.com/highcharts.js"></script>

{{--<script>
  Highcharts.chart('chartKategori', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Jumlah Permintaan Layanan'
    },
    subtitle: {
      text: 'Berdasarkan Kategori Layanan'
    },
    xAxis: {
      categories: [
        'Collocation Server',
        'Hosting',
        'Email Kota Bogor',
        'Sub-Domain',
        'Aplikasi',
        'Wi-Fi Publik',
        'Jaringan',
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Kategori Layanan',
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6]
      

    }]
  });
</script> --}}




{{-- SCRIPT GRAFIK --}}
<!--Perangkat Daerah-->
<!-- grafik status ->chartstatuspd-->
<script>
  Highcharts.chart('chartstatuspd', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Belum Diverifikasi',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('status_id','1');
        })->count();?>,
        sliced: true,
        selected: true
      }, {
        name: 'Ditolak',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('status_id','6');
        })->count(); ?>,
      }, {
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('status_id','2');
        })->count();?>,
      }, {
        name: 'Sudah Dijawab',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->whereIn('status_id',[3,7]);
        })->count();?>,
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('status_id','4');
        })->count();?>,
      }, {
        name: 'Selesai',
        y: <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->whereIn('status_id',[5,8]);
        })->count();?>,
      }]
    }]
  });
</script>

<!--Perangkat Daerah-->
<!-- berdasarkan Kategori->chartkategoripd  -->
<script>
  var categories = [
    'Aplikasi',
    'Sub Domain', 
    'Email Kota Bogor', 
    'Jaringan',
    'Wifi Public',
    'Hosting', 
    'Collocation Server', 
    'Permohonan Data Statistik Tingkat Kota Bogor',
    'Konsultasi Pengelolaan Aplikasi Sibadra',
    'Streaming Radio dan Iklan Layanan Masyarakat', 
    'Publikasi Media Sosial (IG, Twitter, FB, YT)', 
    'Kemitraan Media',
    'Lain-Lain',
  ];
  Highcharts.chart('chartkategoripd', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','1');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','2');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','3');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','4');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','5');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','6');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','7');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','8');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','9');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','10');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','11');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','12');
        })->count();?>,
        <?php echo DB::table('layanan')->where('pd_id',Auth::user()->pd_id)
        ->where(function ($query) {
            $query->where('kategori_id','13');
        })->count();?>,
      ]
    }, ]
  });
</script>
<!-- selesai -->

<!-- berdasarkan bidang  verifikator->chartbidangv -->
 <script>
  var categories = [
    'Layanan E-Goverment ', 'Teknologi Informasi', 'Statistik Sektoral', 'Komunikasi dan Informasi Publik','Lain-Lain'
  ];
  Highcharts.chart('chartbidangv', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Bidang'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Bidang',
      data: [
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [1,3])->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>, 
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [4,7])->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','8')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [9,12])->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', 13)->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,
        ,
      ]
    }, ]
  });
</script>

<!--Chart status->chartstatussuperadmin-->
<script>
  Highcharts.chart('chartstatussuperadmin', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.0f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Belum Diverifikasi',
        y: <?php echo DB::table('layanan')->where('status_id','1')->count();?>,
        sliced: true,
        selected: true
      }, {
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id','2')->count();?>,
      }, {
        name: 'Sudah Dijawab-Umum',
        y: <?php echo DB::table('layanan')->where('status_id','3')->count();?>,
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('status_id','4')->count();?>,
      }, {
        name: 'Selesai-Umum',
        y: <?php echo DB::table('layanan')->where('status_id','5')->count();?>,
      }, {
        name: 'Ditolak',
        y: <?php echo DB::table('layanan')->where('status_id','6')->count(); ?>,
      }, {
        name: 'Sudah Dijawab-Bidang',
        y: <?php echo DB::table('layanan')->where('status_id','7')->count();?>,
      }, {
        name: 'Selesai-Bidang',
        y: <?php echo DB::table('layanan')->where('status_id','8')->count();?>,
      }]
    }]
  });
</script>


<!--Chart Kategori->chartkategorisuperadmin-->
<script>
  var categories = [
    'Aplikasi',
    'Sub Domain', 
    'Email Kota Bogor', 
    'Jaringan',
    'Wifi Public',
    'Hosting', 
    'Collocation Server', 
    'Permohonan Data Statistik Tingkat Kota Bogor',
    'Konsultasi Pengelolaan Aplikasi Sibadra',
    'Streaming Radio dan Iklan Layanan Masyarakat', 
    'Publikasi Media Sosial (IG, Twitter, FB, YT)', 
    'Kemitraan Media',
    'Lain-Lain',
  ];
  Highcharts.chart('chartkategorisuperadmin', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id','1')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','2')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','3')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','4')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','5')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','6')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','7')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','8')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','9')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','10')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','11')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','12')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','13')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,4,5,6,7,8]);
            })->count(); ?>,  
      ]
    }, ]
  });
</script>


<!-- berdasarkan bidang  super admin->chartbidang -->
 <script>
  var categories = [
    'Layanan E-Goverment ', 'Teknologi Informasi', 'Statistik Sektoral', 'Komunikasi dan Informasi Publik', 'Lain-Lain'
  ];
  Highcharts.chart('chartbidangsuperadmin', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Bidang'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Bidang',
      data: [
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [1,3])->count(); ?>, 
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [4,7])->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','8')->count(); ?>,  
        <?php echo DB::table('layanan')->wherebetween('kategori_id', [9,12])->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', [13])->count(); ?>,
      ]
    }, ]
  });
</script>

<!--Chart status->chartstatuspdv-->
<script>
  Highcharts.chart('chartstatuspdv', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Belum Diverifikasi',
        y: <?php echo DB::table('layanan')->where('status_id','1')->count();?>,
        sliced: true,
        selected: true
      }, {
        name: 'Ditolak',
        y: <?php echo DB::table('layanan')->where('status_id','6')->count(); ?>,
      }, {
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id','2')->count();?>,
      }, {
        name: 'Sudah Dijawab-Umum',
        y: <?php echo DB::table('layanan')->where('status_id','3')->count();?>,
      }, {
        name: 'Selesai-Umum',
        y: <?php echo DB::table('layanan')->where('status_id','5')->count();?>,
      }]
    }]
  });
</script>


<!--Chart Kategori->chartkategoripdv-->
<script>
  var categories = [
    'Aplikasi',
    'Sub Domain', 
    'Email Kota Bogor', 
    'Jaringan',
    'Wifi Public',
    'Hosting', 
    'Collocation Server', 
    'Permohonan Data Statistik Tingkat Kota Bogor',
    'Konsultasi Pengelolaan Aplikasi Sibadra',
    'Streaming Radio dan Iklan Layanan Masyarakat', 
    'Publikasi Media Sosial (IG, Twitter, FB, YT)', 
    'Kemitraan Media',
    'Lain-Lain',
  ];
  Highcharts.chart('chartkategoripdv', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id','1')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','2')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','3')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','4')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','5')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','6')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','7')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','8')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','9')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','10')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','11')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','12')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
        <?php echo DB::table('layanan')->where('kategori_id','13')->where(function ($query) {
                $query->whereIn('status_id', [1,2,3,5,6]);
            })->count(); ?>,  
      ]
    }, ]
  });
</script>




<!--Bidang Egov, kategori=123, status=2,4,7,8-->
<!-- grafik status->chartstatusegov-->
<script>
  Highcharts.chart('chartstatusegov', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id', '2')->where(function ($query) {
                $query->whereBetween('kategori_id', [1,3]);
            })->count(); ?>,
        sliced: true,
        selected: true
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('status_id', '4')->where(function ($query) {
                $query->whereBetween('kategori_id', [1,3]);
            })->count(); ?>,
      }, {
        name: 'Sudah Dijawab-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '7')->where(function ($query) {
                $query->whereBetween('kategori_id', [1,3]);
            })->count(); ?>,
      }, {
        name: 'Selesai-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '8')->where(function ($query) {
                $query->whereBetween('kategori_id', [1,3]);
            })->count(); ?>,
      }]
    }]
  });
</script>

<!--Bidang Egov, kategori=123 status=2,4,7,8-->
<!-- berdasarkan Kategori->chartkategoriegov  -->
<script>
  var categories = [
    'Aplikasi',
    'Sub Domain', 
    'Email Kota Bogor', 
  ];
  Highcharts.chart('chartkategoriegov', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id', '1')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '2')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '3')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
      ]
    }, ]
  });
</script>


<!--Bidang TI, kategori=4-7, status=2,4,7,8-->
<!-- grafik status->chartstatusti-->
<script>
  Highcharts.chart('chartstatusti', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id', '2')->where(function ($query) {
                $query->whereBetween('kategori_id', [4,7]);
            })->count(); ?>,
        sliced: true,
        selected: true
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('status_id', '4')->where(function ($query) {
                $query->whereBetween('kategori_id', [4,7]);
            })->count(); ?>,
      }, {
        name: 'Sudah Dijawab-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '7')->where(function ($query) {
                $query->whereBetween('kategori_id', [4,7]);
            })->count(); ?>,
      }, {
        name: 'Selesai-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '8')->where(function ($query) {
                $query->whereBetween('kategori_id', [4,7]);
            })->count(); ?>,
      }]
    }]
  });
</script>


<!--Bidang TI, kategori=4-7 status=2,4,7,8-->
<!-- berdasarkan Kategori->chartkategoriti  -->
<script>
  var categories = [
    'Jaringan',
    'Wifi Public',
    'Hosting', 
    'Collocation Server',
  ];
  Highcharts.chart('chartkategoriti', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false, 
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id', '4')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '5')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '6')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '7')->where(function ($query) {
            $query->whereIn('status_id', [2,4,7,8]);
        })->count(); ?>,
      ]
    }, ]
  });
</script>


<!--Bidang statistik, kategori=8 status=2,4,7,8-->
<!-- berdasarkan Kategori->chartkategoristatistik  -->
<script>
  var categories = [
    'Permohonan Data Statistik Tingkat Kota Bogor',
    ];
  Highcharts.chart('chartkategoristatistik', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}, {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id', '8')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
      ]
    }, ]
  });
</script>

<!--Bidang Statistik, kategori=8, status=2,4,7,8-->
<!-- grafik status->chartstatusstatistik -->
<script>
  Highcharts.chart('chartstatusstatistik', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id', '2')->where(function ($query) {
                $query->where('kategori_id', '8');
            })->count(); ?>,
        sliced: true,
        selected: true
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('status_id', '4')->where(function ($query) {
                $query->where('kategori_id', '8');
            })->count(); ?>,
      }, {
        name: 'Sudah Dijawab-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '7')->where(function ($query) {
                $query->where('kategori_id', '8');
            })->count(); ?>,
      }, {
        name: 'Selesai-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '8')->where(function ($query) {
                $query->where('kategori_id', '8');
            })->count(); ?>,
      }]
    }]
  });
</script>




<!--Bidang kip, kategori=9-12 status=2,4,7,8-->
<!-- berdasarkan Kategori->chartkategorikip  -->
<script>
  var categories = [
    'Konsultasi Pengelolaan Aplikasi Sibadra',
    'Streaming Radio dan Iklan Layanan Masyarakat', 
    'Publikasi Media Sosial (IG, Twitter, FB, YT)', 
    'Kemitraan Media',
    ];
  Highcharts.chart('chartkategorikip', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Permintaan Layanan Berdasarkan  Kategori'
    },
    accessibility: {
      point: {
        valueDescriptionFormat: '{index}. {xDescription}. {value}%.'
      }
    },
    xAxis: [{
      categories: categories,
      reversed: false,
      labels: {
        step: 1
      },
      accessibility: {
        description: ''
      }
    }, {
      opposite: true,
      reversed: false,
      categories: categories,
      linkedTo: 0,
      labels: {
        step: 1
      },
    }],
    yAxis: {
      title: {
        text: null
      },
      labels: {

      },
      accessibility: {
        description: 'Permintaan Layanan',
        rangeDescription: 'Range: 0 to 100%'
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '&nbsp;' + this.point.category + '</b><br/>' +
          'Permintaan Layanan sebanyak ' + Highcharts.numberFormat(this.y) + '';
      }
    },
    series: [{
      name: 'Kategori',
      data: [
        <?php echo DB::table('layanan')->where('kategori_id', '9')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '10')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
       <?php echo DB::table('layanan')->where('kategori_id', '11')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
        <?php echo DB::table('layanan')->where('kategori_id', '12')->where(function ($query) {
                $query->whereIn('status_id', [2,4,7,8]);
            })->count(); ?>,
      ]
    }, ]
  });
</script>

<!--Bidang kip, kategori=9-12, status=2-5-->
<!-- grafik status->chartstatuskip -->
<script>
  Highcharts.chart('chartstatuskip', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Permintaan Layanan Bedasarkan Status'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Disposisi Kebidang',
        y: <?php echo DB::table('layanan')->where('status_id', '2')->where(function ($query) {
                $query->whereBetween('kategori_id', [9,12]);
            })->count(); ?>,
        sliced: true,
        selected: true
      }, {
        name: 'Peninjauan Lapangan',
        y: <?php echo DB::table('layanan')->where('status_id', '4')->where(function ($query) {
                $query->whereBetween('kategori_id', [9,12]);
            })->count(); ?>,
      }, {
        name: 'Sudah Dijawab-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '7')->where(function ($query) {
                $query->whereBetween('kategori_id', [9,12]);
            })->count(); ?>,
      }, {
        name: 'Selesai-bidang',
        y: <?php echo DB::table('layanan')->where('status_id', '8')->where(function ($query) {
                $query->whereBetween('kategori_id', [9,12]);
            })->count(); ?>,
      }]
    }]
  });
</script>
@endsection