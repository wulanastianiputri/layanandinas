@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Data Master Bidang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/kategories">Data Master Kategori</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="tambah">Tambah Kategori</div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; " action="{{ route('kategories.store') }}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Tambah Kategori Layanan') }}</h4>
        </div>

        <div class="card-body">
          @csrf
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="namakategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
            <div class="col-md-6 mb-4">
              <input id="namakategori" type="text" class="form-control @error('namakategori') is-invalid @enderror" name="namakategori" value="{{ old('namakategori') }}" required autocomplete="namakategori" autofocus>
              @error('namakategori')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <label for="bidang_id" class="text-right col-md-4 control-label {{ $errors->has('bidang_id') ? ' has-error' : '' }}">Nama Bidang</label>
            <div class="col-sm-6">
              <select name="bidang_id" class="form-control" required>
                @foreach ($bidangs as $bidang)
                <option value="{{ $bidang->id }}">{{ $bidang->namabidang }}</option>
                @endforeach
              </select>
              @if ($errors->has('bidang_id'))
              <span class="help-block">
                <strong>{{ $errors->first('bidang_id') }}</strong>
              </span>
              @endif
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