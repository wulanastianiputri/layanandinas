@extends('backend.layouts.master', ['title' => 'Edit Pengguna'])
@section('title','Helpdesk')
    
@section ('content')
<div class="section-header">
  <h1>Pengguna</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a href="/users">Data Master Pengguna</a></div>
      <div class="breadcrumb-item"><a href="edit">Edit Pengguna</a></div>
    </div>
</div>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data">
              <div class="card-header center"><h4>{{ __('Edit Pengguna') }}</h4></div>

              <div class="card-body">
                  {{ csrf_field() }}
                  {{ method_field('put') }}

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                          
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="name"  placeholder="name" name="name" value="{{ $users->name }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif  
                          </div>
                      </div>                     



                      <div class="form-group row{{ $errors->has('pd_id') ? ' has-error' : '' }}">
       
                        <label for="pd_id" class="col-md-4 col-form-label text-md-right">{{ __('Perangkat Daerah') }}</label>
      
                        <div class="col-md-6">
                          <select class="form-control" name="pd_id" required="">
                            @foreach ($pds as $pd)
        
                              <option value="{{$pd->id}}" {{ $users->pd_id === $pd->id ? "selected" : ""}}>{{$pd->namapd}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('pd_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('pd_id') }}</strong>
                          </span>
                          @endif				
                        </div>
                    </div>
                    
                    <div class="form-group row{{ $errors->has('level_id') ? ' has-error' : '' }}">
       
                      <label for="level_id" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>
    
                      <div class="col-md-6">
                        <select class="form-control" name="level_id" required="">
                          @foreach ($levels as $level)
      
                            <option value="{{$level->id}}" {{ $users->level_id === $level->id ? "selected" : ""}}>{{$level->namalevel}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('level_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('level_id') }}</strong>
                        </span>
                        @endif				
                      </div>
                  </div>

                

                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                    
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="username"  placeholder="username" name="username" value="{{ $users->username }}" required autofocus>
                      @if ($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif  
                    </div>
                  </div>

                  {{-- <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="password"  placeholder="password" name="password"  required autofocus>
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif  
                    </div>
                  </div> --}}

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
                  <label for="foto_user" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                  
                  <div class="col-md-6">
                    <img class="product" width="100" @if ($users->foto_user) src="{{asset('images/user/'.$users->foto_user) }}" @endif />
                    <input type="file" accept="image/*" class="uploads form-control" id="foto_user" style="margin-top: 20px;" name="foto_user">     
                    @if ($errors->has('foto_user'))
                      <span class="help-block">
                          <strong>{{ $errors->first('foto_user') }}</strong>
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