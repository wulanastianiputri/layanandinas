
@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')

<div class="section-header">
  <h1>Data Master</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/kategories">Data Master Kategori</a></div>
    
    </div>
  </div>
  <div class="display">
    <div class ="section-body">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h5>
            Data Master Kategori
          </h5>
        </section>
        <!-- Dashboard -->

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <a href="{{route('kategories.create')}}" class="btn btn-icon icon-left btn-primary mr-1"><i class="far fa-edit"></i>Tambah Kategori</a>
          <hr>
          <table class="table table-striped table-bordered table-sm" id="tabel-data">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>	
                <th>Aksi</th>	
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($kategories as $kategori)
              <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $kategori->namakategori }}</td>
                <td width="210px">
                  <form id="data" action="{{ route('kategories.destroy', $kategori->id) }}" method="post">
                   <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('kategories.edit',$kategori->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
                   {{ csrf_field() }}
                   {{ method_field('delete') }}
                   <button type="button"  onclick="deleteRow('data')" class="btn btn-danger" data-toggle="modal" title="Hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>  
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
 
 
 