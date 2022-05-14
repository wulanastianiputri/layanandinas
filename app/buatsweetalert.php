<!-- contoh buat delete di atas di index -->
<form id="data" action="{{ route('layanans.destroy', $layanan->id) }}" method="post">                    
<a class="btn btn-info" href="{{ route('layanans.show',$layanan->id) }}">Detail</a>
<a class="btn btn-warning " href="{{route('layanans.edit',$layanan->id)}}"> Edit </a>
{{ csrf_field() }}
{{ method_field('delete') }}
<button type="button"  onclick="deleteRow('data')" class="btn btn-danger">Delete &nbsp;</button>  
</form>
<!-- udah berhasil tapi tombol ga cute -->
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