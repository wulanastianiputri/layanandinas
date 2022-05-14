@extends('backend.layouts.master', ['title' => 'Manual Book'])
@section('title','Helpdesk')


@section ('content')
<div class="section-header">
	<h1>Tiket Layanan</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/manualbook">Manual Book</a></div>
	  </div>
  </div>

<!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
<div class="display">
  <!-- Main content -->
  <section class="content">
    <h1 class="light">
      Manual Book
    </h1>
    <div class="col-xs-12">
      <h3>Cara Mengajukan Layanan Melalui Web LADIN (Layanan Dinas)</h3>
      <div class="row">
        <div class="pl-3">
        <iframe src="buku/manualbook.pdf" width="850" height="700"></iframe>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection