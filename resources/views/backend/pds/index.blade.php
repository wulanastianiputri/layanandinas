@extends('backend.layouts.master', ['title' => 'Data Master Perangkat Daerah'])
@section('title','Helpdesk')
    

@section ('content')
<div class="section-header">
  <h1>Data Master </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
      <div class="breadcrumb-item"><a style="text-decoration:none" href="/pds">Data Master Perangkat Daerah</a></div>
    </div>
</div>


<div class="display">
  <div class ="section-body">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h5>
          Data Master Perangkat Daerah
        </h5>
      </section>
      <!-- Dashboard -->
    

     <!-- Main content -->
     <section class="content">
      <div class="col-xs-12">

        <div class="box">
          {{--Query jumlah Data PD--}}
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            @if(Auth::user()->level_id == 0)
            <a href="{{route('pds.create')}}" class="btn btn-icon icon-left btn-primary mr-1"><i class="far fa-edit"></i>Tambah PD</a>
            @endif
            <hr>
            <table class="table table-striped table-bordered table-sm" id="tabel-data">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Perangkat Daerah</th>
                  <th>Nomenklatur</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php $no = 1; ?>
                @foreach ($pds as $pd)
                <tr>
                  <td scope="row">{{ $no++ }}</td>
                  <td>{{ $pd->namapd }}</td>
                  <td>{{ $pd->nomenklatur }}</td>
                  <td>{{ $pd->email }}</td>
                  <td width="210px">
                    <form id="data" action="{{ route('pds.destroy', $pd->id) }}" method="post">

                      
@if (Auth::user()->level_id == 0)
                      <a class="btn btn-primary" data-toggle="tooltip" title="Detail" href="{{ route('pds.show',$pd->id) }}"><i class="fas fa-search-plus"></i></a>
                      <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit" href="{{route('pds.edit',$pd->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <!--<button type="button"  onclick="deleteRow('data')"data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>-->
                      <button type="button" onclick="deleteRow('data')" class="btn btn-danger" data-toggle="modal" title="Hapus" class="btn btn-danger"><i class="fas fa-trash"></i></button>
@elseif(Auth::user()->level_id == 7)

<a class="btn btn-primary " data-toggle="tooltip" title="Detail" href="{{ route('pds.show',$pd->id) }}"><i class="fas fa-search-plus"></i></a>

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
    </section>
  </div>
  @endsection
  @push('page-scripts')
  <script>
    function deleteRow(data) {
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
          $('#' + data).submit();
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