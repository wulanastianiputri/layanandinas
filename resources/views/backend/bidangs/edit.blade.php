@extends('backend.layouts.master', ['title' => 'Edit Data Master Bidang'])
@section('Edit','Helpdesk')
@section ('content')
<div class="section-header">
  <h1>Data Master Bidang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/bidangs">Data Master Bidang</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Data Master Bidang</div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('bidangs.update', $bidangs->id) }}" enctype="multipart/form-data">
              <div class="card-header center"><h4>{{ __('Edit Data Master Bidang') }}</h4></div>

              <div class="card-body">
                  {{ csrf_field() }}
                  {{ method_field('put') }}

                      <div class="form-group row">
                          <label for="namabidang" class="col-md-4 col-form-label text-md-right">{{ __('Bidang') }}</label>
                          
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="namabidang" placeholder="Nama Bidang" name="namabidang" value="{{ $bidangs->namabidang }}" required autofocus>
                            @if ($errors->has('namabidang'))
                            <span class="help-block">
                              <strong>{{ $errors->first('namabidang') }}</strong>
                            </span>
                            @endif  
                          </div>
                      </div>

                        
                     <div class="card-footer text-right">
                          <button type="submit" id="submit" class="btn btn-primary mr-1">Update Data </button>
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