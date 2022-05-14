@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class="display">
<div class ="section-body">

    
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<section class="content-header">
		<h1>
		  Detail Status
		</h1>
	  </section>
    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12"> 
		 <!-- Table row -->
			  <div class="box-body">
				<div class="col-xs-12 table-responsive">
				  <table class="table table-striped">
					<tr>
					  <td>Nama Status</td>
					  <td>{{ $statuss->namastatus }}</td>
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