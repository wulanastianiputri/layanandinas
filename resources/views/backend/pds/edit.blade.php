@extends('backend.layouts.master', ['title' => 'Edit Perangkat Daerah'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Data Master Perangkat Daerah</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/pds">Data Master Perangkat Daerah</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Perangkat Daerah</a></div>
    </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; " action="{{ route('pds.update', $pds->id)}}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Edit Perangkat Daerah') }}</h4>
        </div>

        <div class="card-body">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <div class="form-group row">
            <label for="namabidang" class="col-md-4 col-form-label text-md-right">{{ __('Nama Perangkat Daerah') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="namapd" placeholder="Nama Perangkat Daerah" name="namapd" value="{{ $pds->namapd }}" required autofocus>
              @if ($errors->has('namapd'))
              <span class="help-block">
                <strong>{{ $errors->first('namapd') }}</strong>
              </span>
              @endif
            </div>



            <label for="nomenklatur" class="col-md-4 col-form-label text-md-right">{{ __('Nomenklatur') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="nomenklatur" placeholder="Nomenklatur" name="nomenklatur" value="{{ $pds->nomenklatur }}" required autofocus>
              @if ($errors->has('nomenklatur'))
              <span class="help-block">
                <strong>{{ $errors->first('nomenklatur') }}</strong>
              </span>
              @endif
            </div>

            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{{ $pds->alamat }}" required autofocus>
              @if ($errors->has('alamat'))
              <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
              </span>
              @endif
            </div>

            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ $pds->email }}" required autofocus>
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>

            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="telp" placeholder="Telepon" name="telp" value="{{ $pds->telp }}" required autofocus>
              @if ($errors->has('telp'))
              <span class="help-block">
                <strong>{{ $errors->first('telp') }}</strong>
              </span>
              @endif
            </div>

            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="website" placeholder="Website" name="website" value="{{ $pds->website }}" required autofocus>
              @if ($errors->has('website'))
              <span class="help-block">
                <strong>{{ $errors->first('website') }}</strong>
              </span>
              @endif
            </div>

            <label for="kontak" class="col-md-4 col-form-label text-md-right">{{ __('Kontak') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="kontak" placeholder="Kontak" name="kontak" value="{{ $pds->kontak }}" required autofocus>
              @if ($errors->has('kontak'))
              <span class="help-block">
                <strong>{{ $errors->first('kontak') }}</strong>
              </span>
              @endif
            </div>

            <label for="hp" class="col-md-4 col-form-label text-md-right">{{ __('HP') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="hp" placeholder="HP" name="hp" value="{{ $pds->hp }}" required autofocus>
              @if ($errors->has('hp'))
              <span class="help-block">
                <strong>{{ $errors->first('hp') }}</strong>
              </span>
              @endif
            </div>

      </form>

      <div class="card-footer text-right">
        <button type="submit" id="submit" class="btn btn-primary mr-1">Update Data </button>
      </div>
  


  
    </div>
  </div>
</div>
</div>
</div>

@endsection
@push('page-scripts')
@endpush