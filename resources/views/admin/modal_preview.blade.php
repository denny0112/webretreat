<div class="modal" tabindex="-1" id="mpreview">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="nama"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" id="gambar" class="w-100">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnKonfirmasi">Konfirmasi Pembayaran</button>
        </div>
      </div>
    </div>
  </div>


  <script>
      url = '{{asset("/bukti")}}';
      function preview(bukti,nama,id) {
        $('#mpreview').modal("show");
        $('#nama').html(nama);
        $('#gambar').attr("src",url+"/"+bukti);
        $('#btnKonfirmasi').attr("onclick",'verifikasi('+id+')');
      }
  </script>
