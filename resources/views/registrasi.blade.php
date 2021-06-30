@extends('layout')

@section('body')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-0 col-md-2"></div>
            <div class="col-12  col-md-8 col-lg-8">
                <div class="card card-body shadow mt-5 p-0 mb-5" style="background-image: url({{asset('BG-CARD.png')}});background-size: cover;">
                    <div class="row p-3 p-lg-0 ">
                        <div class="col-12 col-md-12  col-lg-6 p-5 text-center my-auto" >
                            <h1 style="font-size: 62pt;color:white">{{$tema->system_judul}}</h1>
                            <p style="color:white">{{$tema->system_deskripsi}}</p>
                            <a href="https://www.instagram.com/pd.istts/" class="btn  rounded-pill  mt-2" style="background-color:  rgb(225,48,108);color:white;"> <ion-icon name="logo-instagram" class="align-middle"></ion-icon> pd.istts </a>
                        </div>
                        <div class="col-12 col-md-12  col-lg-6 p-5" style="background-color: white;">
                            <h2>Daftar</h2>
                            <div class="mb-4" style="background-color: #3F3259;height:3px;width:100px"></div>
                            <form action="/" id="fregis" method="post">
                                <div class="form-group">
                                    <label>NRP/Noreg*</label>
                                    <input type="text" class="form-control" name="nrp" required placeholder="NRP/Noreg">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap*</label>
                                    <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Kontak*</label>
                                    <input type="text" class="form-control" name="kontak" required placeholder="ID Line / Nomer Whatsapp">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin*</label>
                                    <select name="jenis" class="form-control" required>
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan*</label>
                                    <select name="jurusan" class="form-control" required>
                                        <option selected disabled>Jurusan</option>
                                        <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
                                        <option value="S1 Design Komunikasi Visual">S1 Design Komunikasi Visual</option>
                                        <option value="S1 Teknik Industri">S1 Teknik Industri</option>
                                        <option value="S1 Teknik Desain Produk">S1 Teknik Desain Produk</option>
                                        <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                                        <option value="S1 Sistem Informasi Bisnis">S1 Sistem Informasi Bisnis</option>
                                        <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alergi/Penyakit Bawaan</label>
                                    <textarea class="form-control" name="alergi" placeholder="Alergi jika ada"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row ">
                                        <div class="col-8">
                                            <a href="/pembayaran"><button class="btn btn-info rounded-pill"  type="button"><ion-icon name="receipt-outline" class="align-middle"></ion-icon> Verifikasi Pembayaan</button></a>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button class="btn btn-success rounded-pill pl-4 pr-4"  type="button" onclick="daftar()"  style="background-color: #3F3259;"><ion-icon name="paper-plane-outline" class="align-middle"></ion-icon> Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
    </div>
    <script>
        function daftar() {
            $.ajax({
                url:"/regis",
                data:$('#fregis').serialize(),
                success:function(e){
                    if(e==1){
                        toastr.options.positionClass = "toast-top-right";
                        toastr.options.closeButton = "true";
                        toastr.success("Berhasi Register, Segera konfirmasi pembayaran!");
                    }
                    else{
                        toastr.options.positionClass = "toast-top-right";
                        toastr.options.closeButton = "true";
                        toastr.error("NRP/Noreg sudah terdaftar!");
                    }
                    $('#fregis').trigger("reset");
                }
            })
        }
    </script>
@endsection
