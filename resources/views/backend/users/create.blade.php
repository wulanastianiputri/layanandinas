


@extends('backend.layouts.master', ['title' => 'Tambah Pengguna'])
@section('title','Helpdesk')

@section('content')
<div class="section-header">
    <h1>Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="/users">Data Master Pengguna</a></div>
        <div class="breadcrumb-item"><a style="text-decoration:none" href="create">Tambah Pengguna</a></div>
      </div>
  </div>
  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('users.store') }}" enctype="multipart/form-data">
                <div class="card-header center"><h4>{{ __('Tambah Pengguna') }}</h4></div>

                <div class="card-body">
                        @csrf
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" {{$errors->has('pd_id') ? 'has-error' : null}}>
                            <label for="pd_id" class="col-md-4 col-form-label text-md-right">{{ __('Perangkat Daerah') }}</label>

                          <div class="col-md-6">
                              <select name="pd_id" class="form-control" required>
                                @foreach ($pds as $pd)
                                    <option value="{{ $pd->id }}">{{ $pd->namapd }}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('pd_id'))
                              <span class="help-block">
                                <strong>{{ $errors->first('pd_id') }}</strong>
                              </span>
                              @endif				
                            </div>
                        </div>

                        <div class="form-group row" {{$errors->has('level_id') ? 'has-error' : null}}>
                            <label for="level_id" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                          <div class="col-md-6">
                              <select name="level_id" class="form-control" required>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->namalevel }}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('level_id'))
                              <span class="help-block">
                                <strong>{{ $errors->first('level_id') }}</strong>
                              </span>
                              @endif				
                            </div>
                        </div>


                       
{{-- 
                        <div class="form-group row" {{$errors->has('level') ? 'has-error' : null}}>
                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                            <div class="col-md-6">
                                <select name="level" id="" class="form-control">
                                    <option value="" hidden selected>---Pilih Level---</option>
                                    <option value="0"> Super Admin</option>
                                    <option value="1"> Perangkat Daerah</option>
                                    <option value="2"> Verifikator</option>
                                    <option value="3"> Bidang E-Government</option>
                                    <option value="4"> Bidang Teknologi dan Informasi</option>
                                    <option value="5"> Bidang Statistik Data Sektoral</option>
                                    <option value="6"> Bidang Komunikasi dan informasi Publik</option>
                                    <option value="7"> Eksekutif</option>
                                </select>
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  --}}
                          

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>         
                
                       
                        <div class="form-group row">

                            <label for="foto_user" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</br><span style="color:red"> JPEG/PNG <br/>(Ukuran: 2 MB (max))</span></label>	
                              
                            <div class="col-md-6">
                              <img class="product" width="200"/>
                              <input type="file" class="uploads form-control" id="foto_user" name="foto_user" accept="image/* " >
                              @error('password')
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