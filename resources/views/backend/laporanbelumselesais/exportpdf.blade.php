<table class="logo" border="0">
	<tr>
		<td width="13%" rowspan="3" align="center"><img src="/buku/logokotabogor.png" width="55px"></td>
		<td class="kop1" width="87%">PEMERINTAH KOTA BOGOR</td>
	</tr>
  <tr>
		<td class="kop2">DINAS KOMUNIKASI DAN INFORMATIKA</td>
	</tr>
	<tr>
		<td class="kop3" >Jl. Ir. H. Juanda No 10 Bogor 
      Jawa Barat - Indonesia, Telp. 0251- 8321075  <br>
		Website:kominfo.kotabogor.go.id, E-mail:kominfo@kotabogor.go.id <br>
		B O G O R - 1 6 1 2 1
		</td>
	</tr>	
</table>
<hr><hr>

<table class="table table-stripped table-bordered table-sm">
    <tr>
      <th>Perangkat Daerah</th>
      <th>Kategori</th>
      <th>Judul</th>
      <th>Isi</th>
      <!-- <th>Foto</th>											 -->
    </tr>
						
  @foreach ($laporanbelumselesais as $laporanbelumselesai)
    <tr>
      <td>{{ $laporanbelumselesai->pd ['namapd'] }}</td>
      <td>{{ $laporanbelumselesai->kategori ['namakategori'] }}</td>
      <td>{{ $laporanbelumselesai->judul }}</td>
      <td>{!! $laporanbelumselesai->isi !!}</td>
      {{-- <!-- <td class="py-1">
        @if ($laporanbelumselesai->layanan ['foto'])
          <img src="{{url('images/layanan/'. $laporanbelumselesai->layanan ['foto'])}}" width="100" alt="image" syle="margin-right: 10px;"/>
        @else
          <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
        @endif
      </td> --> --}}
    </tr>
  @endforeach
                          
</table>