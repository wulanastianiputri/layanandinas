@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class ="section-body">

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Permintaan Layanan</h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/jawabans">Kategori Layanan</a></li>
        <li class="active">Detail Permintaan Layanan</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
              {{--<h3 class="box-title">Detail <b>{{$jawabans->judul}}</b></h3>--}}
				<div class="col-xs-12">
					<a href="{{route('jawabans.index')}}">
						<button type="button" class="btn btn-success pull-right"> Kembali</button>
					<a>
				</div>				  
            </div>
 
		 <!-- Table row -->
			  <div class="box-body">
				<div class="col-xs-12 table-responsive">
				  <table class="table table-striped">
					<tr>
					  <td>Perangkat Daerah</td>
					  <td>{{ $jawabans->layanan->pd ['namapd'] }}</td>
					</tr>
					<tr>
					  <td>Kategori</td>
					  <td>{{ $jawabans->layanan->kategori ['namakategori'] }}</td>
					</tr>
					<tr>
					  <td>Judul</td>
					  <td>{{ $jawabans->layanan ['judul'] }}</td>
					</tr>
					<tr>
					  <td>Isi</td>
					  <td>{{ $jawabans->layanan ['isi'] }}</td>
					</tr>
					<tr>
					  <td>Foto</td>
					  <td class="py-1">
                      @if ($jawabans->layanan ['foto'])
                        <img src="{{url('images/layanan/'. $jawabans->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @else
                        <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @endif
                    </td>
					</tr>
					<tr>
					  <td>Status</td>
					  <td>{{ $jawabans->status ['namastatus'] }}</td>
					</tr>
					
					<tr>
					  <td>Jawaban</td>
					  <td>{{ $jawabans->jawaban }}</td>
					</tr>
					<tr>
					  <td>Foto</td>
					  <td>
					  @if ($jawabans->foto_jawaban) 
						<img src="{{url('images/jawaban/'. $jawabans->foto)}}" width="200" alt="image" style="margin-right: 10px;"/>
					  @else
						<img src="{{url('images/jawaban/default.png')}}" width="200" alt="image" style="margin-right: 10px;"/>
					  @endif
					  </td>
					</tr>					
				   </table>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
		</div>	 
		</div>
		</div>
    </section>	  
</div>
</div>

@endsection
@push('page-scripts')
    
@endpush
