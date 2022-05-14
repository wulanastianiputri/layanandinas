@extends('backend.layouts.master', ['title' => 'Edit Layanan'])
@section('title','Permintaan Layanan')

@section ('content')
<div class="section-header">
	<h1>Tiket Layanan</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/layanans">Tiket Layanan</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Layanan</a></div>
	  </div>
  </div>

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <h1>
        Permintaan Layanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/layanans">Permintaan Layanan</a></li>
        <li class="active">Update Permintaan Layanan</li>
      </ol>
    </section> --}}

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('layanans.update', $layanans->id) }}" enctype="multipart/form-data">
                  <div class="card-header center"><h4>{{ __('Edit Layanan') }}</h4></div>
    
                  <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                             
                        
           
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
          
                        <div class="form-group row{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
       
                          <label for="kategori_id" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
        
                          <div class="col-md-6">
                            <select class="form-control" name="kategori_id" required="">
                              @foreach ($kategories as $kategori)
					
                                <option value="{{$kategori->id}}" {{ $layanans->kategori_id === $kategori->id ? "selected" : ""}}>{{$kategori->namakategori}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('kategori_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('kategori_id') }}</strong>
                            </span>
                            @endif				
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}<span style="color:red"> *</span></label>
                        
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="judul"  placeholder="judul" name="judul" value="{{ $layanans->judul}}" required autofocus>
                          @if ($errors->has('judul'))
                          <span class="help-block">
                            <strong>{{ $errors->first('judul') }}</strong>
                          </span>
                          @endif  
                        </div>
                    </div>  
                    
                    <div class="form-group row">
                      <label for="isi" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}<span style="color:red"> *</span></label>
                      
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="isi" placeholder="" name="isi"  required autofocus>{{ $layanans->isi }}
                        </textarea>
                        @if ($errors->has('isi'))
                        <span class="help-block">
                          <strong>{{ $errors->first('isi') }}</strong>
                        </span>
                        @endif  
                      </div>
                  </div>  

                  <div class="form-group row">
                  
                    <label for="foto" class="col-md-4 col-form-label text-md-right"></br>{{ __('Foto') }}</br><span style="color:red"> JPEG/PNG <br/>(Ukuran: 200 MB (max))</span></label>
                    
                    <div class="col-md-6">
                      <img class="product" width="200" @if ($layanans->foto) src="{{asset('images/layanan/'.$layanans->foto) }}" @endif />
                      <input type="file" accept="image/*" class="uploads form-control" id="foto" style="margin-top: 20px;" name="foto">     
                      @if ($errors->has('foto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
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
            
            {{-- <form class="form-horizontal" method="POST" action="{{ route('layanans.update', $layanans->id) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('put') }}
              <div class="box-body">			
                <div class="form-group{{ $errors->has('namapd') ? ' has-error' : '' }}">
                  <label for="namapd" class="col-sm-2 control-label">Nama Perangkat Daerah</label>
                  <div class="col-sm-10">
				            <select class="form-control" name="namapd" required="">
                      @foreach($pds as $pd)
                        <option value="{{$pd->id}}" {{ $layanans->namapd === $pd->id ? "selected" : ""}}>{{$pd->namapd}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('namapd'))
                      <span class="help-block">
                        <strong>{{ $errors->first('namapd') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>	

                <div class="form-group{{ $errors->has('namakategori') ? ' has-error' : '' }}">
                  <label for="namakategori" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
				            <select class="form-control" name="namakategori" required="">
                      @foreach($kategories as $kategori)
                        <option value="{{$kategori->id}}" {{ $layanans->namakategori === $kategori->id ? "selected" : ""}}->{{$kategori->namakategori}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('namakategori'))
                      <span class="help-block">
                        <strong>{{ $errors->first('namakategori') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>	
                <div class="form-group{{ $errors->has('namastatus') ? ' has-error' : '' }}">
                  <label for="namakategori" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
				            <select class="form-control" name="namastatus" required="">
                      @foreach($statuss as $status)
                        <option value="{{$status->id}}" {{ $layanans->namastatus === $status->id ? "selected" : ""}}->{{$status->namastatus}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('namastatus'))
                      <span class="help-block">
                        <strong>{{ $errors->first('namastatus') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>	

                <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                  <label for="judul" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{ $layanans->judul }}" required autofocus>
                    @if ($errors->has('judul'))
                      <span class="help-block">
                        <strong>{{ $errors->first('judul') }}</strong>
                      </span>
                    @endif					
                  </div>
                </div>

                <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
                  <label for="isi" class="col-sm-2 control-label">Isi</label>

                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="isi" placeholder="" name="isi"  required autofocus>{{ $layanans->isi }}
                    </textarea>
                    
                    @if ($errors->has('isi'))
                      <span class="help-block">
                        <strong>{{ $errors->first('isi') }}</strong>
                      </span>
                    @endif					
                  </div>
                </div>

                <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                  <label for="foto" class="col-sm-2 control-label">Foto</label>	

                  <div class="col-sm-10">
                    <img class="product" width="200" @if ($layanans->foto) src="{{asset('images/layanan/'.$layanans->foto) }}" @endif />
                    <input type="file" accept="image/*" class="uploads form-control" id="foto" style="margin-top: 20px;" name="foto">     
					          @if ($errors->has('foto'))
                      <span class="help-block">
                          <strong>{{ $errors->first('foto') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>	
           
              <!-- /.box-body -->
			  
              <div class="box-footer">
                <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                      <button type="submit" id="submit"class="btn btn-info">Update Data </button>
                  </div>				  
              </div>
              <!-- /.box-footer -->			  
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->	
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div> --}}

@endsection
@push('page-scripts')
    
@endpush