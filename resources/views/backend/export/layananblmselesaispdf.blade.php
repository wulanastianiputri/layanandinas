<table class="table" style="border: 1px" solid #ddd>
    <thead>
        <tr>
            <th>PERANGKAT DAERAH</th>
            <th>KATEGORI</th>
            <th>JUDUL</th>
            <th>FOTO</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($layananblmselesais as $layananblmselesai)

        <tr>
            <td>{{ $layananblmselesai->pd ['namapd'] }}</td>
            <td>{{ $layananblmselesai->kategori ['namakategori'] }}</td>
            <td>{{ $layananblmselesai->judul }}</td>
            <td class="py-1">
                @if ($layananblmselesais->foto)
                <img src="{{url('images/layanan/'. $layananblmselesai->foto)}}" width="100" alt="image" syle="margin-right: 10px;"/>
                @else
                <img src="{{url('images/layanan/default.png')}}" width="100" alt="image" syle="margin-right: 10px;"/>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>