@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Data Master Kategori</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/kategories">Data Master Kategori</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Data Master Kategori</div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; " action="{{ route('kategories.update', $kategories->id)}}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Edit Data Master Kategori') }}</h4>
        </div>
        <div class="card-body">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <div class="form-group row">
            <label for="namakategori" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kategori Layanan') }}</label>
            <div class="col-md-6 mb-4">
              <input type="text" class="form-control" id="namakategori" placeholder="Nama Kategori Layanan" name="namakategori" value="{{ $kategories->namakategori}}" required autofocus>
              @if ($errors->has('namakategori'))
              <span class="help-block">
                <strong>{{ $errors->first('namakategori') }}</strong>
              </span>
              @endif
            </div>

            <label for="bidang_id" class="text-right col-md-4 control-label {{ $errors->has('bidang_id') ? ' has-error' : '' }}">Nama Bidang</label>
            <div class="col-sm-6">
              <select class="form-control" name="bidang_id" required="">
                @foreach($bidangs as $bidang)
                <option value="{{$bidang->id}}" {{ $kategories->bidang_id === $bidang->id ? "selected" : ""}}>{{$bidang->namabidang}}</option>
                @endforeach
              </select>
              @if ($errors->has('bidang_id'))
              <span class="help-block">
                <strong>{{ $errors->first('bidang_id') }}</strong>
              </span>
              @endif
            </div>
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