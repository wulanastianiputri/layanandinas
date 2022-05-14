<!DOCTYPE html>
<html>
  <head>
    <title> Cetak PDF Berdasarkan Status
    </title>
  </head>
  <body>
      <div class="form-group">
        <p align="center"><b>Laporan Permintaan Layanan Berdasarkan Tanggal</b></p>
        <table class="static p-3" align="center"  rules="all" border="5px" style="width:96%;">
          <tr>
            <th>No.</th>
            <th>Perangkat Daerah</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Judul</th>
            <th>Tanggal</th>
          </tr>
                  
						    @foreach ($laporanberdasarkanstatuss as $laporanberdasarkanstatus)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporanberdasarkanstatus->pd ['namapd'] }}</td>
                    <td>{{ $laporanberdasarkanstatus->kategori ['namakategori'] }}</td>
                    <td>{{ $laporanberdasarkanstatus->status ['namastatus'] }}</td>
                    <td>{{ $laporanberdasarkanstatus->judul }}</td>      
                    <td>{{ $laporanberdasarkanstatus->tanggal }}</td>   
              </tr>
              @endforeach                         
            </table>
          </div>
        </body>
      </html>
