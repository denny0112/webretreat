@foreach ( $data as $item)
    <tr>
        <td>{{$item->peserta_nrp}}</td>
        <td>{{$item->peserta_nama}}</td>
        <td>{{$item->peserta_jurusan}}</td>
        <td>{{$item->peserta_jenis}}</td>
        <td>
            @if($item->peserta_status == 0)
                <div class="badge badge-warning">Belum Bayar</div>
            @else
                <div class="badge badge-success">Sudah Bayar</div>
            @endif
        </td>
    </tr>
@endforeach
