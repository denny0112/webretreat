@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"absensi"])
@extends('admin.modal_preview')
@section('body')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Daftar Sesi</h4>
                </div>
                <div class="card-body p-4">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="tbd">
                        <thead>
                          <tr>
                              <th>Nama Sesi</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="tbtdaftar">

                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</section>
@endsection

@section('scripts')
    <script>
        loadData();

        function loadData() {
        $('#tbtdaftar').load('/getSesi',function () {
            $('#tbd').DataTable();
        });
    }
    function tambahSesi() {
        $.ajax({
            url:"/tambahSesi",
            data:$('#fsesi').serialize(),
            success:function(){
                loadData();
                toastr.options.positionClass = "toast-top-right";
                toastr.options.closeButton = "true";
                toastr.success("Tambah Sesi Behasil!");
            }
        })
    }
    </script>
@endsection
