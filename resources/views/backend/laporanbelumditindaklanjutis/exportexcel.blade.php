{{-- <!DOCTYPE html>
<html>
  <head>
    <title> Cetak PDF Layanan Belum ditindaklanjuti
    </title>
  </head>
  <body>
<table class="static" align="center"  rules="all" border="1px"style="width:96%;">
  <tr>
    <th>No.</th>
    <th>Perangkat Daerah</th>
    <th>Kategori</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Tanggal</th>
  </tr>
          
@foreach ($laporanbelumditindaklanjutis as $laporanbelumditindaklanjuti)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $laporanbelumditindaklanjuti->pd->namapd }}</td>
    <td>{{ $laporanbelumditindaklanjuti->kategori->namakategori}}</td>
    <td>{{ $laporanbelumditindaklanjuti->judul }}</td>
    <td>{!! $laporanbelumditindaklanjuti->isi !!}</td>
    {{-- <!-- <td class="py-1">
    @if ($laporanbelumditindaklanjuti->layanan ['foto'])
        <img src="{{url('images/layanan/'. $laporanbelumditindaklanjuti->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
      @else
        <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
      @endif
    </td>-->r> --}}
   {{--}} <td>{{ $laporanbelumditindaklanjuti->tanggal }}</td>
  </tr>
@endforeach                         
</table> --}}
<!DOCTYPE html>
<html>
  <head>
    <title> Cetak Excel Berdasarkan Tanggal
    </title>
  </head>
  <body>
      <div class="form-group">
        <p align="center"><b>Laporan Permintaan Layanan Berdasarkan Tanggal</b></p>
        <table class="static" align="center"  rules="all" border="1px"style="width:96%;">
          <tr>
            <th>No.</th>
            <th>Perangkat Daerah</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
          </tr>
                  
        {{-- @foreach ($cetakpertanggal as $laporanbelumditindaklanjuti) --}}
        @foreach ($laporanbelumditindaklanjutis as $laporanbelumditindaklanjuti)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $laporanbelumditindaklanjuti->pd->namapd }}</td>
            <td>{{ $laporanbelumditindaklanjuti->kategori->namakategori}}</td>
            <td>{{ $laporanbelumditindaklanjuti->judul }}</td>
            <td>{!! $laporanbelumditindaklanjuti->isi !!}</td>
            {{-- <!-- <td class="py-1">
            @if ($laporanbelumditindaklanjuti->layanan ['foto'])
                <img src="{{url('images/layanan/'. $laporanbelumditindaklanjuti->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
              @else
                <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
              @endif
            </td>-->r> --}}
            <td>{{ $laporanbelumditindaklanjuti->tanggal }}</td>
          </tr>
        @endforeach                         
      </table>
  </body>

  
   