@extends('backend.layouts.master', ['title' => 'Tambah FAQ'])
@section('title','Helpdesk')
@section ('content')
<div class="section-header">
    <h1>Tambah FAQ</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/faqs">FAQ</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="">Tambah FAQ</a></div>
      </div>
  </div>
<div class="section-body">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('faqs.store') }}" enctype="multipart/form-data">
                <div class="card-header center"><h4>{{ __('Tambah FAQ') }}</h4></div>

                <div class="card-body">
                        @csrf
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="pertanyaan" class="col-md-4 col-form-label text-md-right">{{ __('Pertanyaan') }}</label>
                            
                            <div class="col-md-6">
                                <input id="pertanyaan" type="text" class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan" value="{{ old('pertanyaan') }}" required autocomplete="pertanyaan" autofocus>

                                @error('pertanyaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="jawaban" class="col-md-4 col-form-label text-md-right">{{ __('Jawaban') }}</label>
                          
                          <div class="col-md-6">
                              <input id="jawaban" type="text" class="form-control @error('jawaban') is-invalid @enderror" name="jawaban" value="{{ old('jawaban') }}" required autocomplete="jawaban" autofocus>

                              @error('jawaban')
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