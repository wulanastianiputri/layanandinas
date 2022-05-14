@extends('backend.layouts.master', ['title' => 'Edit Profil'])
@section('title','Helpdesk')

@section ('content')
<div class="section-header">
	<h1>Edit Profil</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/profil">Profil</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="#">Edit Profil</a></div>
	  </div>
  </div>

            <form  method="POST"   action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data">
                
  
                <div >
                            @method('patch')
                            @csrf
                            <div class="row mt-sm-4">
                                <div class="col-12 col-md-12 ">
                                  <div class="card profile-widget">
                                    <div class="profile-widget-header">
                                      <div class="py-1">
                                        @if (Auth::user()->foto_user )
                                          <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" height="100" alt="foto pengguna" class="rounded-circle profile-widget-picture"/>
                                        @else
                                          <img src="{{url('../assets/img/avatar/avatar-1.png')}}" width="100" height="100" alt="foto pengguna" class="rounded-circle profile-widget-picture"/>
                                        @endif
                                      </div>
                                    </div>
                                   
                              <div class="col-12">
                                <div class="card">
                                  
                                   <div class="card-header">
                                     <div class="row">
                                    <table class="table table-striped  border ">
                                      <tbody>
                                        <tr>
                                          <th scope="row" colspan="" >Perangkat Daerah</th>
                                          <td >:</td>
                                          <td colspan="6">{{ Auth::user()->pd->namapd }}</td>
                          
                                          <th scope="row" colspan="2" >Nama Pengguna</th>
                                          <td >:</td>
                                          <td colspan="">{{ old('name', $user->name) }}
                                        </td>			
                                        </tr>
                          
                                        <tr>
                                          <th scope="row" colspan="" >E-mail</th>
                                          <td >:</td>
                                          <td colspan="6"><input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror </td>
                          
                                          <th scope="row" colspan="2" >Alamat</th>
                                          <td >:</td>
                                          <td colspan=""><input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ Auth::user()->pd->alamat }}" autocomplete="alamat" autofocus>

                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        </tr>
                                    
                                        <tr>
                                          <th scope="row" colspan="" >Telp</th>
                                          <td >:</td>
                                          <td colspan="6"><input id="telp" type="text" class="form-control @error('kontak') is-invalid @enderror" name="telp" value="{{ Auth::user()->pd->telp }}" autocomplete="telp" autofocus>

                                            @error('telp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                          
                                          <th scope="row" colspan="2" >Website</th>
                                          <td >:</td>
                                          <td colspan=""><input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ Auth::user()->pd->website }}" autocomplete="website" autofocus>

                                            @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        
                                        </tr>
                                       @if(Auth::user()->level_id == 1 )
                                        <tr>
                                          <th scope="row" colspan="" >Kontak</th>
                                          <td >:</td>
                                          <td colspan="6"><input id="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ Auth::user()->pd->kontak }}" autocomplete="kontak" autofocus>

                                            @error('kontak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                          
                                          <th scope="row" colspan="2" >No. Hp</th>
                                          <td >:</td>
                                          <td colspan=""><input id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ Auth::user()->pd->hp }}" autocomplete="hp" autofocus>

                                            @error('hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        </tr>
                                     @else
                                     @endif
                                        
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                                    
                                        <div class="card-footer text-right">
                                            <button type="submit" id="submit" class="btn btn-primary mr-1">Update Data </button>
                                       </div>
                                   
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                          
                          @endsection
       
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update') }}">
                        @method('patch')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <label id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" autocomplete="username" autofocus>{{ $user->username }}</label>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_user" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto_user" type="text" class="form-control @error('foto_user') is-invalid @enderror" name="foto_user" value="{{ old('foto_user', $user->foto_user) }}" autocomplete="foto_user" autofocus>

                                @error('foto_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <label id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">{{ $user->email }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}