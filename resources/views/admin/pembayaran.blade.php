@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"dashboard"])
@extends('admin.modal_preview')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="section">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Daftar Minta Verifikasi</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="tbd2">
                      <thead>
                        <tr>
                            <th>NRP</th>
                            <th>Bukti</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbtbayar">

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
         loadBayar();
         function loadBayar() {
            $('#tbtbayar').load('/getBayar',function () {

                $('#tbd2').DataTable({"paging":   false,
                    "ordering": false,
                    "pageLength": 10,
                    "info":     false,
                    "searching": false
                });

            });
        }
</script>

@endsection
