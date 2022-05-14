@extends('backend.layouts.master', ['title' => 'Detail Tiket Layanan'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
	<h1>Pengguna</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a href="/users">Pengguna</a></div>
		<div class="breadcrumb-item"><a href="show">Detail Pengguna</a></div>
	  </div>
  </div>

<div class="display">
	<div class ="section-body">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			{{--<section class="content-header">
			<h1>Permintaan Layanan</h1>
			<ol class="breadcrumb">
				<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="/layanans">Permintaan Layanan</a></li>
				<li class="active">Detail Permintaan Layanan</li>
			</ol>
			</section>--}}

			
    		<!-- Main content -->
			<div class="section">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="content-header">
								<h5>Detail Pengguna</h5>
							</div>
				 			<div class="card-header">
								<table class="table table-striped  border ">
									<tbody>
										<tr>
											<th scope="row" colspan="2" >Nama</th>
											<td >:</td>
											<td colspan="">{{ $users->name}}</td>
											
											<th scope="row" colspan="2" >Perangkat Daerah</th>
											<td >:</td>
											<td colspan="">{{ $users->pd ['namapd']}}</td>
										</tr>

										<tr>
											<th scope="row" colspan="2" >Level</th>
											<td >:</td>
											<td colspan="">{{ $users->level}}</td>

											<th scope="row" colspan="2">Username</th>
											<td >:</td>
											<td colspan="">{{ $users->username}}</td>
										</tr>
	
										<tr>
											<th scope="row" colspan="2" >Email</th>
											<td >:</td>
											<td colspan="">{{ $users->email}}</td>

											<th scope="row" colspan="2" >Foto</th>
											<td >:</td>
											<td colspan="10">
												@if ($users->foto_user) 
													<img src="{{url('images/user/'. $users->foto_user)}}" width="100" alt="image" style="margin-right: 10px;"/>
												@else
													<img src="{{url('images/user/default.png')}}" width="100" alt="image" style="margin-right: 10px;"/>
												@endif
											</td>
										</tr>
								</table>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</section>
	
		@endsection
		@push('page-scripts')
		<script>
		  function deleteRow(data)
		{
		  const swalWithBootstrapButtons = Swal.mixin({
	  customClass: {
		confirmButton: 'btn btn-success',
		cancelButton: 'btn btn-danger'
	  },
	  buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
	  title: 'Apakah Anda yakin ingin menghapus?',
	  text: "Data yang telah dihapus tidak dapat dikembalikan!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Ya, hapus!',
	  cancelButtonText: 'Tidak, jangan hapus',
	  reverseButtons: true
	  }).then((result) => {
	  if (result.isConfirmed) {
		$('#'+data).submit();
		swalWithBootstrapButtons.fire(
		  'Deleted!',
		  'Your file has been deleted.',
		  'success'
		)
	  } else if (
	   
		result.dismiss === Swal.DismissReason.cancel
	  ) {
		swalWithBootstrapButtons.fire(
		  'Cancelled',
		  'Data tidak jadi dihapus',
		  'error'
		)
	  }
	  })
		}
		</script>
	@endpush