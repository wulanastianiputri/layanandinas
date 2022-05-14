@extends('backend.layouts.master')
@section('title','Helpdesk')
@section ('content')
<div class="section-header">
  <h1>Data Master Level</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/levels">Data Master Level</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="create">Tambah Data Master Level</a></div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('levels.store') }}" enctype="multipart/form-data">
              <div class="card-header center"><h4>{{ __('Tambah Level') }}</h4></div>

              <div class="card-body">
                      @csrf
                      {{ csrf_field() }}

                      <div class="form-group row">
                          <label for="namalevel" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>
                          
                          <div class="col-md-6">
                              <input id="namalevel" type="text" class="form-control @error('namalevel') is-invalid @enderror" name="namalevel" value="{{ old('namalevel') }}" required autocomplete="namalevel" autofocus>

                              @error('namalevel')
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


