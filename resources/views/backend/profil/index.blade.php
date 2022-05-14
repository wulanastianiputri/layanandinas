@extends('backend.layouts.master')
@section('title','Helpdesk')


@section ('content')
<div class="section-header">
  <h1>Profil</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
    <div class="breadcrumb-item ">Profil</div>
  </div>
</div>



{{-- <div class="section-body">
  <div class="row">
    <div class="profile-widget-header">
      <div class="py-1">
        @if (Auth::user()->foto_user )
          <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" height="100" alt="foto pengguna" class="rounded-circle profile-widget-picture"/>
        @else
          <img src="{{url('../assets/img/avatar/avatar-1.png')}}" width="100" height="100" alt="foto pengguna" class="rounded-circle profile-widget-picture"/>
        @endif
      </div>
    </div> --}}
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

            <!--Alert-->
      @if (session('message'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span></span>
          </button>
          {{session('message')}}
        </div>
      </div>
      @endif

      <div class="card ">
        
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
                <td colspan="">{{ Auth::user()->username }}</td>			
              </tr>

              <tr>
                <th scope="row" colspan="" >E-mail</th>
                <td >:</td>
                <td colspan="6">{{ Auth::user()->email }} </td>

                <th scope="row" colspan="2" >Alamat</th>
                <td >:</td>
                <td colspan="">{{ Auth::user()->pd->alamat }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="" >Telp</th>
                <td >:</td>
                <td colspan="6">{{ Auth::user()->pd->telp }}</td>

                <th scope="row" colspan="2" >Website</th>
                <td >:</td>
                <td colspan="">{{ Auth::user()->pd->website }}</td>
              </tr>

              @if(Auth::user()->level_id == 1 )
              <tr>
                <th scope="row" colspan="" >Kontak</th>
                <td >:</td>
                <td colspan="6">{{ Auth::user()->pd->kontak }}</td>

                <th scope="row" colspan="2" >No. Hp</th>
                <td >:</td>
                <td colspan="">{{ Auth::user()->pd->hp }}</td>
              </tr>
             @else
             @endif
            {{-- "{{route('profile.edit')}} " --}}


              
            </tbody>
          </table>
           </div>
           <div class="row">
            {{-- <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('profile.edit')}} "><i class="fas fa-pencil-alt" ></i></a> --}}
           <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('profiles.edit')}} "><i class="fas fa-pencil-alt" ></i></a>
            
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection