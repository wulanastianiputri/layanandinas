<!DOCTYPE html>
<html>
  <head>
    <title> Cetak PDF Berdasarkan Kategori
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
                @foreach ($laporanberdasarkankategoris as $laporanberdasarkankategori)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporanberdasarkankategori->pd ['namapd'] }}</td>
                    <td>{{ $laporanberdasarkankategori->kategori ['namakategori'] }}</td>
                    <td>{{ $laporanberdasarkankategori->status ['namastatus'] }}</td>
                    <td>{{ $laporanberdasarkankategori->judul }}</td>
                    <td>{{ $laporanberdasarkankategori->tanggal }}</td>
                  </tr>
                  @endforeach                         
                </table>
              </div>
            </body>
          </html>
    
