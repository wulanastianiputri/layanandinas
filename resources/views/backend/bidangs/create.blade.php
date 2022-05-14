@extends('backend.layouts.master', ['title' => 'Tambah Data Master Bidang'])
@section('Tambah','Helpdesk')

@section('content')
<div class="section-header">
    <h1>Data Master Bidang</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/bidangs">Data Master Bidang</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="tambah">Tambah Bidang</div>
      </div>
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('bidangs.store') }}" enctype="multipart/form-data">
                <div class="card-header center"><h4>{{ __('Tambah Bidang') }}</h4></div>

                <div class="card-body">
                        @csrf
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="namabidang" class="col-md-4 col-form-label text-md-right">{{ __('Bidang') }}</label>
                            
                            <div class="col-md-6">
                                <input id="namabidang" type="text" class="form-control @error('namabidang') is-invalid @enderror" name="namabidang" value="{{ old('namabidang') }}" required autocomplete="namabidang" autofocus>

                                @error('namabidang')
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


