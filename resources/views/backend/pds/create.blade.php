@extends('backend.layouts.master', ['title' => 'Tambah Perangkat Daerah'])
@section('title','Helpdesk')

@section ('content')
<div class="section-header">
  <h1>Data Master Perangkat Daerah</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/pds">Data Master Perangkat Daerah</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="create">Tambah Perangkat Daerah</a></div>
    </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; " action="{{  route('pds.store') }}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Tambah Perangkat Daerah') }}</h4>
        </div>

        <div class="card-body">
          @csrf
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="namapd" class="col-md-4 col-form-label text-md-right">{{ __('Nama Perangkat Daerah') }}</label>
            <div class="col-md-6 mb-4">
              <input id="namapd" type="text" class="form-control @error('namapd') is-invalid @enderror" name="namapd" value="{{ old('namapd') }}" required autocomplete="namapd" autofocus>
              @error('namapd')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="nomenklatur" class="col-md-4 col-form-label text-md-right">{{ __('Nomenklatur') }}</label>
            <div class="col-md-6 mb-4">
              <input id="nomenklatur" type="text" class="form-control @error('nomenklatur') is-invalid @enderror" name="nomenklatur" value="{{ old('nomenklatur') }}" required autocomplete="nomenklatur" autofocus>
              @error('nomenklatur')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
            <div class="col-md-6 mb-4">
              <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
              @error('alamat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            <div class="col-md-6 mb-4">
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
            <div class="col-md-6 mb-4">
              <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>
              @error('telp')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
            <div class="col-md-6 mb-4">
              <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus>
              @error('website')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="kontak" class="col-md-4 col-form-label text-md-right">{{ __('Kontak') }}</label>
            <div class="col-md-6 mb-4">
              <input id="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak') }}" required autocomplete="kontak" autofocus>
              @error('kontak')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="hp" class="col-md-4 col-form-label text-md-right">{{ __('HP') }}</label>
            <div class="col-md-6 mb-4">
              <input id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" required autocomplete="hp" autofocus>
              @error('hp')
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