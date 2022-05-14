 
@extends('backend.layouts.master', ['title' => 'Tiket Layanan Belum diverifikasi'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Tiket Layanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/layanans">Tiket Layanan Belum dierifikasi</a></div>
    </div>
</div>

<div class="display">
  <div class ="section-body">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h5>
         Tiket Layanan Belum diverifikasi
        </h5>
      </section>
    
  
    <!-- Main content -->
    <section class="content ">
      <div class="col-xs-12">    
  <!--tabel-->
          <div class="box">
          </div>
          <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            @if (auth()->user()->level=="Admin Perangkat Daerah")
              <a href="{{route('layanans.create')}}" class="btn btn-icon icon-left btn-primary mr-1"><i class="far fa-edit"></i>Tambah</a>
            @endif
              <hr>
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
          
              <table class="table table-striped table-bordered table-sm" id="tabel-data">
                <thead>
                    <tr>
                      <th>No</th>
                     
                      <th>Perangkat Daerah</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>judul</th>
                      <th>Foto</th>			
                      <th>Aksi</th>	
                    </tr>
                </thead>
                <tbody>
                
                  @foreach ($layanans as $layanan)
                  <tr>
                    <td>{{$layanan->id}}
                    
                    <td>{{ $layanan->pd ['namapd'] }}</td>
                    <td>{{ $layanan->kategori ['namakategori'] }}</td>
                    @if($layanan->status_id == 1)
                    <td div class="badge badge-warning" >{{ $layanan->status ['namastatus'] }}</td>
                    @elseif($layanan->status_id == 2)
                    <td div class="badge badge-primary" >{{ $layanan->status ['namastatus'] }}</td>
                    @elseif($layanan->status_id == 3)
                    <td div class="badge badge-info" >{{ $layanan->status ['namastatus'] }}</td>
                    @elseif($layanan->status_id == 4)
                    <td div class="badge badge-light" >{{ $layanan->status ['namastatus'] }}</td>
                    @elseif($layanan->status_id == 5)
                    <td div class="badge badge-success" >{{ $layanan->status ['namastatus'] }}</td>
                    @elseif($layanan->status_id == 6)
                    <td div class="badge badge-danger" >{{ $layanan->status ['namastatus'] }}</td>  
                    @elseif($layanan->status_id == 7)
                    <td div class="badge badge-info" >{{ $layanan->status ['namastatus'] }}</td>  
                    @elseif($layanan->status_id == 8)
                    <td div class="badge badge-success" >{{ $layanan->status ['namastatus'] }}</td>      
                    @endif
                   
                    <td>{{ $layanan->judul }}</td>
                    <td class="py-1">
                      @if ($layanan->foto)
                        <img src="{{url('images/layanan/'. $layanan->foto)}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @else
                        <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @endif
                    </td>
                    
                    <td width="210px" class="card-footer text-center">
                    
                       <form id="data" action="{{ route('layanans.destroy', $layanan->id) }}" method="post">
                    @if(Auth::user()->level_id == 1)
                    
                        <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.
                          007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></a>
                        @if($layanan->status_id == 1)
                        <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('layanans.edit',$layanan->id)}}">
                          <i class="fas fa-pencil-alt"></i></a>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <!--<a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. 
                          Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>-->
                        <button type="button"  onclick="deleteRow('data')" data-toggle="tooltip" title="Delete"
                         class="btn btn-danger"><i class="fas fa-trash"></i></button>                          
                        @endif
                    @elseif(Auth::user()->level_id == 2)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                    @elseif(Auth::user()->level_id == 3)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                    @elseif(Auth::user()->level_id == 4)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                  @elseif(Auth::user()->level_id == 5)
                  <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></a>
                    @elseif(Auth::user()->level_id == 6)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                    @elseif(Auth::user()->level_id == 7)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                    @elseif(Auth::user()->level_id == 0)
                    <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('layanans.show',$layanan->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                    @endif
                      </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              
            
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    @endsection
    @push('page-scripts')
    <script>
      function deleteRow(data)
    {
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
  title: 'Apakah Anda yakin ingin menghapus?',
  text: "Data yang telah dihapus tidak dapat dikembalikan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya, hapus!',
  cancelButtonText: 'Tidak, jangan hapus',
  reverseButtons: true
  }).then((result) => {
  if (result.isConfirmed) {
    $('#'+data).submit();
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
   
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Data tidak jadi dihapus',
      'error'
    )
  }
  })
    }
    </script>
@endpush
