@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class="display">
<div class ="section-body">

    
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{--<section class="content-header">
      <h1>Nama Level</h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/levels">Level</a></li>
        <li class="active">Detail Level</li>
      </ol>
    </section>--}}
	<section class="content-header">
		<h1>
		  Detail Level
		</h1>
	  </section>


    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
              {{--<h3 class="box-title">Detail <b>{{$levels->level}}</b></h3>--}}
			  <div class="col-xs-12">
					<a href="{{route('levels.index')}}">
						<button type="button" class="btn btn-icon icon-left btn-light"> Kembali</button>
					<a>
				</div>				  
            </div>
 
		 <!-- Table row -->
			  <div class="box-body">
				<div class="col-xs-12 table-responsive">
				  <table class="table table-striped">
					<tr>
					  <td>Nama Level</td>
					  <td>{{ $levels->namalevel }}</td>
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
</div>
@endsection
@push('page-scripts')
    
@endpush
 
