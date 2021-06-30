@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"daftar_peserta"])
@extends('admin.modal_preview')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="section">

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
                              <th>NRP</th>
                              <th>Nama</th>
                              <th>Jurusan</th>
                              <th>Jenis</th>
                              <th>Kontak</th>
                              <th>Alergi</th>
                              <th>Status</th>
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
            $('#tbtdaftar').load('/getMahasiswaFull',function () {
                $('#tbd').DataTable();
            });
        }
</script>

@endsection
