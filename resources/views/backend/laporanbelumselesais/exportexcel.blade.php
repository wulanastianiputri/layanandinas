                  <tr>
                    <th>Perangkat Daerah</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Isi</th>						
                  </tr>
						
                @foreach ($laporanbelumselesais as $laporanbelumselesai)
                  <tr>
                    <td>{{ $laporanbelumselesai->pd ['namapd'] }}</td>
                    <td>{{ $laporanbelumselesai->kategori ['namakategori'] }}</td>
                    <td>{{ $laporanbelumselesai->judul }}</td>
                    <td>{{ $laporanbelumselesai->isi }}</td>
                  </tr>
                @endforeach
