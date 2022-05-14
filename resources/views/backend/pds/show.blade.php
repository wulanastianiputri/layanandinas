@extends('backend.layouts.master', ['title' => 'Detail Perangkat Daerah'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
	<h1>Data Master Perangkat Daerah</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/pds">Data Master Perangkat Daerah</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="">Detail Perangkat Daerah</a></div>
	  </div>
  </div>

  <div class="display">
	<div class="section-body">
		<div class="content-wrapper">

			<div class="section">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4>Detail Perangkat Daerah</h4>
							</div>

							<div class="card-header">
								<table class="table table-striped  border ">
									<tbody>
										<tr>
											<th scope="row" colspan="" >Perangkat Daerah</th>
											<td >:</td>
											<td>{{ $pds->namapd }}</td>

										</tr>
	
										<tr>
											<th scope="row" colspan="" >Nomenklatur</th>
											<td >:</td>
											<td>{{ $pds->nomenklatur }}</td>
			
											
										</tr>
								
										<tr>
											<th scope="row" colspan="" >Alamat</th>
											<td >:</td>
											<td>{{ $pds->alamat }}</td>
			
											
										</tr>
										
										<tr>
											<th scope="row" colspan="" >Email</th>
											<td >:</td>
											<td> {{ $pds->email }} </td>
										</tr>

										<tr>
											<th scope="row" colspan="" >Telepon</th>
											<td >:</td>
											<td> {{ $pds->telp }} </td>
										</tr>

										<tr>
											<th scope="row" colspan="" >Website</th>
											<td >:</td>
											<td> {{ $pds->website }} </td>
										</tr>

										<tr>
											<th scope="row" colspan="" >Kontak</th>
											<td >:</td>
											<td> {{ $pds->kontak }} </td>
										</tr>

										<tr>
											<th scope="row" colspan="" >Handphone</th>
											<td >:</td>
											<td> {{ $pds->hp }} </td>
										</tr>
						
									</tbody>
								</table>
							</div>


			

	</div>
</div>
</div>

@endsection
@push('page-scripts')

@endpush