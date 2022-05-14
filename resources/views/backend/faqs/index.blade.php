@extends('backend.layouts.master', ['title' => 'FAQ'])
@section('title','Helpdesk')


@section ('content')
<div class="section-header">
  <h1>FAQ</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/faqs">FAQ</a></div>
    
    </div>
</div>


<div class="display">
  <div class="section-body">
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h5>
          FAQ
        </h5>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="col-xs-12">

          <div class="box">
            {{--Query jumlah FAQ--}}
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <a href="{{route('faqs.create')}}" class="btn btn-icon icon-left btn-primary mr-1"><i class="far fa-edit"></i>Tambah</a>
              <hr>
              <table class="table table-striped table-bordered table-sm" id="tabel-data">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>	
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @foreach ($faqs as $faq)
                    <tr>
                      <td scope="row">{{ $no++ }}</td>
                      <td>{{ $faq->pertanyaan }}</td>
                      <td>{{ $faq->jawaban }}</td>
                      <td width="210px">
                        <form id="data" action="{{ route('faqs.destroy', $faq->id) }}" method="post">

                      

                          <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('faqs.show',$faq->id) }}"><i class="fas fa-search-plus"></i></a>
                   
                          <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('faqs.edit',$faq->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                          <!--<button type="button"  onclick="deleteRow('data')"data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>-->
                          <button type="button" onclick="deleteRow('data')" class="btn btn-danger" data-toggle="modal" title="Hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
    
    
    
                        </form>
                    </td>
                    </tr>
                      @endforeach
                  </tbody>
              </table>
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
  
  
  
  