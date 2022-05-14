@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class="display">
<div class ="section-body">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Kategori Layanan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kategori Layanan</a></li>
        <li class="active">Detail Kategori</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail <b>{{$kategories->namakategori}}</b></h3>
				<div class="col-xs-12">
					<a href="{{route('kategories.index')}}">
						<button type="button" class="btn btn-success pull-right"> Kembali</button>
					<a>
				</div>				  
            </div>
 
		 <!-- Table row -->
			  <div class="box-body">
				<div class="col-xs-12 table-responsive">
				  <table class="table table-striped">
					<tr>
					  <td>Nama Kategori Layanan</td>
					  <td>{{ $kategories->namakategori }}</td>
					</tr>
					  <td>Bidang</td>
					  <td>{{ $kategories->bidang ['namabidang'] }}</td>
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