@foreach ($data as $item)
    <tr>
        <td>{{$item->peserta_nrp}}</td>
        <td>{{$item->pembayaran_bukti}}</td>
        <td>{{$item->created_at}}</td>
        <td class="text-center" colspan="2">
            <button class="btn btn-info" onclick="preview('{{$item->pembayaran_bukti}}','{{$item->peserta_nrp}}',{{$item->pembayaran_id}})"><ion-icon name="eye-outline" style="color: white;font-size:15pt" onclick=""></ion-icon></button>
            <button class="btn btn-danger" onclick="verifikasi({{$item->pembayaran_id}})"><ion-icon name="checkmark-circle-outline"  style="color: white;font-size:15pt"></ion-icon></button>
        </td>
    </tr>
    <script>
        function verifikasi(id) {
            $.ajax({
                url:"/verifikasi/"+id,
                success:function(e){
                    toastr.options.positionClass = "toast-top-right";
                    toastr.options.closeButton = "true";
                    toastr.success("Pembayaran "+e+" Terkonfirmasi!");
                    if($('#belum').html()){
                        $('#belum').html(parseInt($('#belum').html())-1);
                        $('#sudah').html(parseInt($('#sudah').html())+1);
                        $('#request').html(parseInt($('#request').html())-1);
                    }
                    if (typeof loadData == 'function') {
                         loadData();
                    }
                    loadBayar();
                    $('#mpreview').modal("hide");
                }
            });
        }
    </script>
@endforeach
