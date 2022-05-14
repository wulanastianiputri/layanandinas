@extends('backend.layouts.master', ['title' => 'Detail FAQ'])
@section('title','Helpdesk')


@section ('content')
<div class="section-header">
    <h1>Detail FAQ</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/faqs">FAQ</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="">Detail FAQ</a></div>
      </div>
  </div>
  <div class="section">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Detail FAQ</h4>
				</div>
				 <div class="card-header">
					<table class="table table-striped  border ">
						<tbody>
							<tr>
								<td><b>Pertanyaan</b></td>
								<td>{{ $faqs->jawaban }}</td>
							</tr>
							<tr>
								<td><b>Jawaban</b></td>
								<td>{{ $faqs->pertanyaan }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('page-scripts')

@endpush