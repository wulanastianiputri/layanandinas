<!DOCTYPE html>
<html>
  <head>
    <title> Cetak PDF Berdasarkan Status
    </title>
  </head>
  <body>
      <div class="form-group">
        <p align="center"><b>Laporan Permintaan Layanan Berdasarkan Status</b></p>
        <table class="static " align="center"  rules="all" border="1px"style="width:96%;">
          <tr>
            <th>No.</th>
            <th>Perangkat Daerah</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <!-- <th>Foto</th>											 -->
          </tr>
						
  @foreach ($laporanberdasarkanstatuss as $laporanberdasarkanstatus)
    <tr>

      <td>{{ $loop->iteration }}</td>
      <td>{{ $laporanberdasarkanstatus->pd ['namapd'] }}</td>
      <td>{{ $laporanberdasarkanstatus->kategori ['namakategori'] }}</td>
      <td>{{ $laporanberdasarkanstatus->status ['namastatus'] }}</td>
      <td>{{ $laporanberdasarkanstatus->judul }}</td>
      <td>{{ $laporanberdasarkanstatus->tanggal }}</td>
      {{-- <!-- <td class="py-1">
        @if ($laporanberdasarkanstatus->layanan ['foto'])
          <img src="{{url('images/layanan/'. $laporanberdasarkanstatus->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
        @else
          <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
        @endif
      </td> --> --}}
    </tr>
    @endforeach                         
  </table>
</div>
</body>
</html>