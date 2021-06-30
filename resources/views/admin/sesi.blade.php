@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"daftar_sesi"])
@extends('admin.modal_preview')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="section">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h4>Tambah Sesi</h4>
            </div>
            <div class="card-body p-4">
              <form action="" method="post" id="fsesi">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <label>Nama Sesi</label>
                            <input type="text" required name="nama" class="form-control">
                        </div>
                        <div class="col-12 col-md-2 text-right">
                            <button class="btn btn-success mt-4" onclick="tambahSesi()" type="button">Tambah Sesi</button>
                        </div>
                    </div>


                </div>
              </form>
            </div>
          </div>
      </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Daftar Peserta</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="tbd">
                        <thead>
                          <tr>
                              <th>Nama Sesi</th>
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
