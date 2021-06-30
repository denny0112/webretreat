@foreach ( $data as $item)
    <tr>
        <td>{{$item->sesi_nama}}</td>
        <th>
            @if ($item->status == 0)
                <div class="label label-danger">Tidak Aktif</div>
            @else
                <div class="label label-success">Aktif</div>
            @endif
        </th>
        <td>
            @if ($item->status == 0)
                <a href="/aktifkan_sesi/{{$item->sesi_id}}" class="btn btn-success">Aktifkan</a>
            @else
                <button disabled class="btn btn-success">Aktifkan</button>
            @endif
            <a href="/detail-absensi/{{$item->sesi_id}}" class="btn btn-info"><ion-icon name="eye-outline" style="color: white;font-size:15pt"></ion-icon></a>
        </td>
    </tr>
@endforeach
