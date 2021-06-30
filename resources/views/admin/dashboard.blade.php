@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"dashboard"])
@extends('admin.modal_preview')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="section">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Pendaftaran
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count" id="belum">{{$belum}}</div>
                <div class="card-stats-item-label">Belum Bayar</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count" id="sudah">{{$sudah}}</div>
                <div class="card-stats-item-label">Sudah Bayar</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count" id="request">{{$request}}</div>
                <div class="card-stats-item-label">Minta Verifikasi</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <ion-icon name="people-outline" style="color: white;font-size:20pt" class="mt-2 pt-1"></ion-icon>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Peserta</h4>
            </div>
            <div class="card-body">
              {{$total}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h4>Update Tema</h4>
            </div>
            <div class="card-body p-4 pt-2">
              <form action="" method="post" id="ftema">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <label>Tema Retreat</label>
                            <input type="text" required name="judul" class="form-control" placeholder="Tema Retret">
                        </div>
                        <div class="col-12 col-md-5">
                            <label>Tagline Retreat</label>
                            <input type="text" required name="deskripsi" class="form-control" placeholder="Tagline Retreat">
                        </div>
                        <div class="col-12 col-md-2 text-right">
                            <button class="btn btn-success mt-4" onclick="updateTema()" type="button">Tambah Sesi</button>
                        </div>
                    </div>


                </div>
              </form>
            </div>
          </div>
      </div>


    <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Peserta</h4>
              <div class="card-header-action">
                <a href="/peserta" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
              </div>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h4>Daftar Minta Verifikasi</h4>
                  <div class="card-header-action">
                    <a href="/vpembayaran" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
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
    loadData();
    loadBayar();

        function loadData() {
            $('#tbtdaftar').load('/getMahasiswa',function () {
                $('#tbd').DataTable({"paging":   false,
                    "ordering": false,
                    "pageLength": 10,
                    "info":     false,
                    "searching": false
                });
            });
        }

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

        function updateTema() {
            $.ajax({
                url:"/updateTema",
                data:$('#ftema').serialize(),
                success:function(){
                    loadData();
                    toastr.options.positionClass = "toast-top-right";
                    toastr.options.closeButton = "true";
                    toastr.success("Update Tema Behasil!");
                    //$('#ftema').trigger('reset');
                }
            })
        }
</script>

@endsection
