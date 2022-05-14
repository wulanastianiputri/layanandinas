@extends('backend.layouts.master', ['title' => 'Detail Tiket Layanan'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
	<h1>Tiket Layanan</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a href="/layanans">Tiket Layanan</a></div>
		<div class="breadcrumb-item"><a href="show">Detail Tiket Layanan</a></div>
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
							<div class="card-header">
								<h4>Detail Tiket Layanan</h4>
							</div>
				 			<div class="card-header">
								<table class="table table-striped  border ">
									<tbody>
										<tr>
											<th scope="row" colspan="" >Tanggal</th>
											<td >:</td>
											<td colspan="6">{{ $layanans->created_at }}</td>
			
											<th scope="row" colspan="2" >Perangkat Daerah</th>
											<td >:</td>
											<td colspan="">{{ $layanans->pd ['namapd'] }}</td>			
										</tr>
	
										<tr>
											<th scope="row" colspan="" >Kategori</th>
											<td >:</td>
											<td colspan="6">{{ $layanans->kategori ['namakategori'] }}</td>
			
											<th scope="row" colspan="2" >Status</th>
											<td >:</td>
											<td colspan="">{{ $layanans->status ['namastatus'] }}</td>
										</tr>
								
										<tr>
											<th scope="row" colspan="" >Judul</th>
											<td >:</td>
											<td colspan="6">{!! $layanans->judul !!}</td>
			
											<th scope="row" colspan="2" >Isi</th>
											<td >:</td>
											<td colspan="">{!! $layanans->isi !!}</td>
										</tr>
										
										<tr>
											<th scope="row" colspan="" >Foto</th>
											<td >:</td>
											<td colspan="10">
												@if ($layanans->foto) 
													<img src="{{url('images/layanan/'. $layanans->foto)}}" width="200" alt="image" style="margin-right: 10px;"/>
												@else
													<img src="{{url('images/layanan/default.png')}}" width="200" alt="image" style="margin-right: 10px;"/>
												@endif
											</td>
										</tr>
						
									</tbody>
								</table>
							</div>

							<div class="col-md-12">
								<!-- Button trigger modal status disposisi -->	
							@if(Auth::user()->level_id == 2)
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
									Disposisi
								</button>
								<form action="/layanans/status_tolak/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Tolak</button>	
								</form> 
							
													
								<form action="/layanans/status_jawab/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Sudah Dijawab</button>	
								</form>
								
								<form action="/layanans/selesai/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Selesai</button>	
								</form> 

								

								@elseif(Auth::user()->level_id == 3)

								<form action="/layanans/jawab/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Sudah Dijawab</button>	
								</form>
								<form action="/layanans/status_peninjauan/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Peninjauan Lapangan</button>	
								</form>
								<form action="/layanans/status_selesai/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Selesai</button>	
								</form>
								@elseif(Auth::user()->level_id == 4)
								<form action="/layanans/jawab/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Sudah Dijawab</button>	
								</form>
								<form action="/layanans/status_peninjauan/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Peninjauan Lapangan</button>	
								</form>
								<form action="/layanans/status_selesai/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Selesai</button>	
								</form>
								
								@elseif(Auth::user()->level_id == 5)
								<form action="/layanans/sudah_dijawab1/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Sudah Dijawab</button>	
								</form>
								<form action="/layanans/status_peninjauan/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Peninjauan Lapangan</button>	
								</form>
								<form action="/layanans/status_selesai/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Selesai</button>	
								</form>	
								@elseif(Auth::user()->level_id == 6)
								<form action="/layanans/sudah_dijawab1/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Sudah Dijawab</button>	
								</form>
								<form action="/layanans/status_peninjauan/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Peninjauan Lapangan</button>	
								</form>
								<form action="/layanans/status_selesai/{{ $layanans->id }}" method="post">
									{{ csrf_field() }}
			
									<!-- <input type="hidden" name="status" value="{{ $layanans->id }}"></input> -->
									<!-- <a href="/layanans/status_tolak" name="filterstatus" id="filterstatus" method="get" class="btn btn-icon icon-left btn-success" style="margin-left:535px;"><i class="far fa-file-pdf"></i>Export PDF</a> -->
									<button class="btn btn-primary" name="status" value="{{ $layanans->id }}" >Selesai</button>	
								</form>
								@endif
								
								
								
							</div>

							

							<hr/>
						</div>
					</div>
				</div>
			</div>
	
<!-- Modal for disposisi -->

@section('modal') 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Disposisi Tiket Layanan</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>	
		<form class="form-horizontal" method="POST" action="/layanans/status_bidang/{{ $layanans->id }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			
		
		<div class="modal-body">
			<div class="form-group row mb-4 {{ $errors->has('kategori_id' ? ' has-error' : '')}}">
				<label for="kategori_id" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
				<div class="col-sm-12 col-md-7">
				  <select name="kategori_id" class="form-control selectric form-select">
					@foreach ($kategories as $kategori)
					
					  <option value="{{$kategori->id}}" {{ $layanans->kategori_id === $kategori->id ? "selected" : ""}}>{{$kategori->namakategori}}</option>
					@endforeach
				  </select>
				  @if ($errors->has('kategori_id'))
					<span class="help-block">
					  <strong>{{ $errors->first('kategori_id') }}</strong>
					</span>
				  @endif
				</div>
			  </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="submit" id="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>
	  </div>
	</div>
  </div>	  
@endsection

 




 
			
			<!--Alert-->
			<div class="mt-5">
			@if (session('message'))
			<div class="alert alert-success alert-dismissible show fade">
			<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span></span>
				</button>
				{{session('message')}}
				</div>
			</div>
			@endif
			</div>
			<section class="content card-header">

			<!--Tampil Jawaban Otomatis-->
			<div class="card-body">
				<tbody>
						<div class="panel-body">
						<h6>Admin Dinas Komunikasi dan Informatika | {{ $layanans->created_at->diffForHumans() }}</h6>
						<p> Terimakasih atas laporan Anda, laporan Kami terima dan akan segera Kami sampaikan ke Bidang terkait. </p>
						</div>
						<hr>
				</tbody>
			</div>

			<!-- Tampil Jawaban -->
			<div class="card-body">
				<tbody>
					@foreach ($layanans->jawaban()->get() as $jawaban)
						<div class="panel-body">
						<h6>{{ $jawaban->user->level}} | {{ $jawaban->user->name}} | {{ $jawaban->created_at->diffForHumans() }}</h6>
						<p> {{ $jawaban->jawaban }} </p>

						{{-- @if ($jawaban->foto_jawaban) 
							<img src="{{url('images/jawaban/'. $jawaban->foto_jawaban)}}" width="200" alt="image" style="margin-right: 10px;"/>
						@else
							<img src="{{url('images/jawaban/default.png')}}" width="200" alt="image" style="margin-right: 10px;"/>
						@endif --}}
						</div>

						
						<td width="210px">
							{{-- @if($layanans->status_id == 5 | $layanans->status_id == 6 | $layanans->status_id == 8)  --}}
							@if($jawaban->user_id != Auth::user()->id) 
							<div></div>
							@else

							<!--edit-->
							
							<style>
								.dropdown {
									position: relative;
									display: inline-block;
								}
								.dropdown-child {
									display: none;
									min-width: 200px;
								}
								.dropdown-child form {
									color: blue;
									padding: 20px;
									text-decoration: none;
									display: block;
								}
								.dropdown:hover .dropdown-child {
									display: block;
								}
							</style>
							<div class="dropdown">
								<button type="button"  data-toggle="tooltip" title="Edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
								<div class="dropdown-child">
									<form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px;" action="{{ route('jawabans.update', $jawaban->id) }}" enctype="multipart/form-data">
										{{ csrf_field() }}
										{{ method_field('put') }}
											<input type="text" class="form-control" id="jawaban"  name="jawaban" value="{{ $jawaban->jawaban}}" required autofocus>
											@if ($errors->has('jawaban'))
											<span class="help-block">
												<strong>{{ $errors->first('jawaban') }}</strong>
											</span>
											@endif  
										<button style="margin-top: 20px;" type="submit" id="submit" class="btn btn-primary mr-1">Update Jawaban</button>
									</form>
								</div>
							</div>

							<!--hapus jawaban-->
							<form id="data" action="{{ route('jawabans.destroy', $jawaban->id) }}" method="post">
						  	{{ csrf_field() }}
							 {{ method_field('delete') }}
							 <button type="button"  onclick="deleteRow('data')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>                           
							</form>
							@endif
						</td>

						<hr>
					@endforeach
				</tbody>
			</div>

			
			@if($layanans->status_id == 5 | $layanans->status_id == 6 | $layanans->status_id == 8) 
		<div></div>
			@else
				<!-- Komentar -->
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					<div class="panel-body">
						<form action="{{ route('jawabans.store', $layanans)}}" method="post" class="form-horizontal">
							@csrf
							
							<div class="form-group"> 
								<textarea name="jawaban" cols="40" row="5" class="form-control" placeholder="Berikan Komentar..."></textarea>
							</div>
					
							{{-- <div class="form-group{{ $errors->has('foto_jawaban') ? ' has-error' : '' }}">
								<label for="foto_jawaban" class="col-sm-2 control-label">Foto Jawaban</label>	
	
								<div class="col-sm-6">
									<img class="product" width="200"/>
									<input name="foto_jawaban" type="file" class="uploads form-control" id="foto_jawaban">     
									@if ($errors->has('foto_jawaban'))
										<span class="help-block">
											<strong>{{ $errors->first('foto_jawaban') }}</strong>
										</span>
									@endif					
								</div>
							</div> --}}
						<input type="submit" value="Kirim" class="btn btn-icon icon-left btn-light">
						</form>
					</div>
				</div>
			@endif
				
				
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