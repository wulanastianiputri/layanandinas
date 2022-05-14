@extends('backend.layouts.master', ['title' => 'Edit FAQ'])
@section('title','Helpdesk')


@section ('content')
<div class="section-header">
  <h1>Edit FAQ</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/faqs">FAQ</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit FAQ</a></div>
    </div>
</div>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('faqs.update', $faqs->id) }}" enctype="multipart/form-data">
              <div class="card-header center"><h4>{{ __('Edit FAQ') }}</h4></div>

              <div class="card-body">
                  {{ csrf_field() }}
                  {{ method_field('put') }}

                      <div class="form-group row">
                          <label for="pertanyaan" class="col-md-4 col-form-label text-md-right">{{ __('Pertanyaan') }}</label>
                          
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="pertanyaan"  placeholder="pertanyaan" name="pertanyaan" value="{{ $faqs->pertanyaan }}" required autofocus>
                            @if ($errors->has('pertanyaan'))
                            <span class="help-block">
                              <strong>{{ $errors->first('pertanyaan') }}</strong>
                            </span>
                            @endif  
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="jawaban" class="col-md-4 col-form-label text-md-right">{{ __('Jawaban') }}</label>
                        
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="jawaban" placeholder="Jawaban" name="jawaban" value="{{ $faqs->jawaban}}" required autofocus>
                          @if ($errors->has('jawaban'))
                          <span class="help-block">
                            <strong>{{ $errors->first('jawaban') }}</strong>
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