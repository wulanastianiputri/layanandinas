@extends('backend.layouts.master', ['title' => 'Edit Status'])
@section('title','Helpdesk')
@section ('content')
<div class="section-header">
  <h1>Data Master Status</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Data Master Status</a></div>
    
    </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form class="card" method="POST" style="margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 20px; "
       action="{{ route('statuss.update', $statuss->id)}}" enctype="multipart/form-data">
        <div class="card-header center">
          <h4>{{ __('Edit Data Master Status') }}</h4>
        </div>

        <div class="card-body">
          {{ csrf_field() }}
          {{ method_field('put') }}

          <div class="form-group row">
            <label for="namastatus" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

            <div class="col-md-6">
              <input type="text" class="form-control" id="namastatus" placeholder="Nama Status" name="namastatus" 
              value="{{$statuss->namastatus }}" required autofocus>
              @if ($errors->has('namastatus'))
              <span class="help-block">
                <strong>{{ $errors->first('namastatus') }}</strong>
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