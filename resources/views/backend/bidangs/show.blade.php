@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class ="section-body">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Nama Bidang</h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Nama Bidang</a></li>
			<li class="active">Detail Bidang</li>
		  </ol>
		</section>
	
	
		<!-- Main content -->
		<section class="content">
		  <!-- title row -->
		  <div class="row">
			<div class="col-xs-12">
			
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">Detail <b>{{$bidangs->bidang}}</b></h3>
					<div class="col-xs-12">
						<a href="{{route('bidangs.index')}}">
							<button type="button" class="btn btn-success pull-right"> Kembali</button>
						<a>
					</div>				  
				</div>
	 
			 <!-- Table row -->
				  <div class="box-body">
					<div class="col-xs-12 table-responsive">
					  <table class="table table-striped">
						<tr>
						  <td>Nama Bidang</td>
						  <td>{{ $bidangs->namabidang }}</td>
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

