@extends('backend.layouts.master', ['title' => 'Data Master Status'])
@section('title','Helpdesk')
@section ('content')

<div class="section-header">
  <h1>Data Master Status</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/pds">Data Master Status</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="create">Tambah Status</a></div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; " 
      action="{{ route('statuss.store') }}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Tambah Status') }}</h4>
        </div>

        <div class="card-body">
          @csrf
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="namastatus" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
            <div class="col-md-6 mb-4">
              <input id="namastatus" type="text" class="form-control @error('namastatus') is-invalid @enderror" name="namastatus"
               value="{{ old('namastatus') }}" required autocomplete="namastatus" autofocus>
              @error('namastatus')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary mr-1">Simpan</button>
            <button type="reset" class="btn btn-secondary">Ulang</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

@endsection
@push('page-scripts')

@endpush

