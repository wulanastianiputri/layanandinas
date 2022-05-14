
@extends('backend.layouts.master', ['title' => 'Data Master Pengguna'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Data Master Pengguna</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/users">Data Master Pengguna</a></div>
    
    </div>
</div>



<div class="display">
  <div class ="section-body">

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h5>
        Pengguna
      </h5>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-xs-12">

          <div class="box">
            {{--Query jumlah Data PD--}}
          </div>
          <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
    @if(Auth::user()->level_id == 0)
            <a href="{{route('users.create')}}" class="btn btn-icon icon-left btn-primary mr-1" data-toggle="tooltip" title="Tambah Pengguna" ><i class="far fa-edit"></i> Tambah pengguna</a>
            @endif 
            <hr>
              <table class="table table-striped table-bordered table-sm" id="tabel-data">
                <thead>
                    <tr>
                      <th> No</th>
                      <th> Nama</th>
                      <th> Username</th>
                      <th> Email</th>
                      {{-- <th> Perangkat Daerah</th> --}}
                      <th> Foto</th> 

                      @if(Auth::user()->level_id == 0)
                      <th> Aksi</th> 
                      @endif
                    </tr>
                </thead>
                <tbody>
                
                  <?php $no = 1; ?>
                  @foreach ($users as $user)
                  <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- <td>{{ $user->pd->namapd }}</td> --}}
                   
                    <td class="py-1">
                      @if ($user->foto_user)
                        <img src="{{url('images/user/'. $user->foto_user)}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @else
                        <img src="{{url('images/user/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                      @endif
                    </td>
                    @if(Auth::user()->level_id == 0)
                    <td width="210px">
                    <form id="data" action="{{ route('users.destroy', $user->id) }}" method="post">
                      <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('users.show',$user->id) }}"><i class="fas fa-search-plus"></i></a>
                      <a class="btn btn-warning" href="{{route('users.edit', $user->id)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="button"  onclick="deleteRow('data')" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>  

                    </form>
                    </td> 
                    @endif 
                  </tr>
                  @endforeach
                </tbody>
            </table>

              
            {{--$pds->links()--}}		
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

