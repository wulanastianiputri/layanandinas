

@extends('backend.layouts.master', ['title' => 'FAQ'])
@section('FAQ','Helpdesk')


@section ('content')
<div class="section-header">
	<h1>FAQ</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/faq">FAQ</a></div>
	  </div>
  </div>

 
          @foreach ($faqs as $faq)
          <tr>
          <div class="card">
            <div class="card-header">
              <h6 class="card-title">{{ $faq->pertanyaan }}</h6>
            </div>
            <div class="card-body">
            <p class="card-text">{{ $faq->jawaban }}</p>
            </div>
          </div>
        </tr>
           @endforeach
   



  @endsection