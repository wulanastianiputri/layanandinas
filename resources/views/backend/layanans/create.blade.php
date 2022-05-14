@extends('backend.layouts.master')
@section('title','Permintaan Layanan')
    

@section ('content')
<div class="section-header">
  <h1>Tiket Layanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/layanans">Tiket Layanan</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="tambah">Tambah Layanan</div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          {{-- <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('layanans.store') }}" enctype="multipart/form-data"> --}}
            <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('layanans.store') }}" enctype="multipart/form-data" id="val" name="val"> 
            <div class="card-header center"><h4>{{ __('Tambah Layanan') }}</h4></div>

              <div class="card-body">
                      @csrf
                      {{ csrf_field() }}
                      {{-- {{ method_field('put') }}  --}}
                             
                        
{{--            
                      <div class="form-group row{{ $errors->has('namapd') ? ' has-error' : '' }}">
     
                          <label for="namapd" class="col-md-4 col-form-label text-md-right">{{ __('Perangkat Daerah') }}</label>
        
                          <div class="col-md-6">
                            <select name="namapd" class="form-control" required>
                           
                                  <option value="{{Auth::user()->pd_id }}">{{ Auth::user()->pd['namapd']  }}</option>
                            
                            </select>
                            @if ($errors->has('namapd'))
                            <span class="help-block">
                              <strong>{{ $errors->first('namapd') }}</strong>
                            </span>
                            @endif				
                          </div>
                      </div>
                     --}}
                    <div class="form-group row{{ $errors->has('pd_id') ? ' has-error' : '' }}">
   
                        <label for="pd_id" class="col-md-4 col-form-label text-md-right">{{ __('Perangkat Daerah') }}</label>
      
                        <div class="col-md-6">
                          <select name="pd_id" class="form-control" required>
                         
                                <option value="{{Auth::user()->pd_id }}">{{ Auth::user()->pd['namapd']  }}</option>
                          
                          </select>
                          @if ($errors->has('pd_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('pd_id') }}</strong>
                          </span>
                          @endif				
                        </div>
                    </div>
      
                      
                      <div class="form-group row{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                        <label for="kategori_id" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}<span style="color:red"> *</span></label>
      
                        <div class="col-md-6">
                          <select name="kategori_id" class="form-control" required="Kategori wajib diisi">
                            @foreach ($kategories as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->namakategori }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('kategori_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('kategori_id') }}</strong>
                            </span>
                          @endif				
                        </div>
                      </div>
      
                       
                      {{-- <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                        <label for="status_id" class="col-sm-2 control-label">Status</label>
      
                        <div class="col-sm-10">
                          <select name="status_id" class="form-control" required>
                            @foreach ($statuss as $status)
                                <option value="{{ $status->id }}">{{ $status->namastatus }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('status_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('status_id') }}</strong>
                            </span>
                          @endif				
                        </div>
                      </div> --}}
                  
              
           
                <div class="form-group row{{ $errors->has('judul') ? ' has-error' : '' }}">
                  <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}<span style="color:red"> *</span></label>
    
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{ old('judul') }}" required autofocus>
                      
                      @if ($errors->has('judul'))
                      <span class="help-block">
                            <strong>{{ $errors->first('judul') }}</strong>
                      </span>
                      @endif					
                  </div>
                </div>	
              

                <div class="form-group row{{ $errors->has('isi') ? ' has-error' : '' }}">
                  <label for="isi" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}<span style="color:red"> *</span></label>
                  
                  <div class="col-md-6">
                      <textarea type="text" class="ckeditor" id="isi" placeholder="isi" name="isi" value="{{ old('isi') }}" required autofocus>
                      </textarea>
                      
                      @if ($errors->has('isi'))
                      <span class="help-block">
                            <strong>{{ $errors->first('isi') }}</strong>
                      </span>
                      @endif					
                  </div>
                </div>
         
                <div class="form-group row{{ $errors->has('foto') ? ' has-error' : '' }}">
                  <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</br><span style="color:red"> JPEG/PNG <br/>(Ukuran: 200 MB (max))</span></label>	

                  <div class="col-md-6">
                    <img class="product" width="200"/>

                    <input type="file" class="uploads form-control" id="foto" name="foto" accept="image/* ">     
                      @if ($errors->has('foto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
                        </span>
                      @endif					
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Ulang</button>
                </div>
              </div>
            </div>
         </form>
        </section>
         
    

@endsection
@push('page-scripts')
    
@endpush


