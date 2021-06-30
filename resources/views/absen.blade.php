@extends('layout')

@section('body')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-0 col-md-2"></div>
            <div class="col-12  col-md-8 col-lg-8">
                <div class="card card-body shadow mt-5 p-0" style="background-image: url({{asset('BG-CARD.png')}});background-size: cover;">
                    <div class="row p-3 p-lg-0 ">
                        <div class="col-12 col-md-12  col-lg-6 p-5 text-center my-auto" >
                            <h1 style="font-size: 62pt;color:white">I'M FOUND.</h1>
                            <p style="color:white">Menjadi generasi yang mengalami perubahan hidup dan menyadari bahwa
                                segala sesuatu bersumber dari Tuhan</p>
                            <a href="https://www.instagram.com/pd.istts/" class="btn  rounded-pill  mt-2" style="background-color:  rgb(225,48,108);color:white;"> <ion-icon name="logo-instagram" class="align-middle"></ion-icon> pd.istts </a>
                        </div>
                        <div class="col-12 col-md-12  col-lg-6 p-5" style="background-color: white;">
                            <h2>Absensi - {{ $sesi_aktif->sesi_nama }}</h2>
                            <div class="mb-4" style="background-color: #3F3259;height:3px;width:100px"></div>
                            <form id="fabsensi" method="POST">
                                @csrf
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="form-group">
                                    <label>NRP/Noreg*</label>
                                    <input type="text" id="absennrp" class="form-control" name="id_qr_code" required placeholder="NRP/Noreg">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-success rounded-pill  mt-3" id="btn"  style="background-color: #3F3259;">Absen</button>
                                </div>

                                <hr>
                                Atau Scan QR Code disini
                                <video id="preview" class="col-md-12 mt-3"></video>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                scanner.addListener('scan', function (content) {
                    $.ajax({
                        method: 'post',
                        url: '/absen/peserta',
                        data: {
                            '_token' : '{{csrf_token()}}',
                            'id_qr_code' : content
                        },
                        success: function(code){
                            if(code == 200){
                                swal("Absensi Berhasil!", "God Bless You!", "success", {
                                    button: "Okay",
                                });
                            }else if(code == 201){
                                swal("Anda Sudah Absen!", "God Bless You!", "success", {
                                    button: "Okay",
                                });
                            }else{
                                swal("Absensi Gagal!", "Coba Lagi Nanti Ya!", "error", {
                                    button: "Okay",
                                });
                            }
                        }
                    });
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    } else {
                    console.error('No cameras found.');
                    }
                }).catch(function (e) {
                console.error(e);
            });

            $("#fabsensi").submit(function(e){
                e.preventDefault();

                $.ajax({
                    method: 'post',
                    url: '/absen/peserta',
                    data: $("#fabsensi").serialize(),
                    success: function(code){
                        if(code == 200){
                            swal("Absensi Berhasil!", "God Bless You!", "success", {
                                button: "Okay",
                            });
                        }else if(code == 201){
                            swal("Anda Sudah Absen!", "God Bless You!", "success", {
                                button: "Okay",
                            });
                        }else{
                            swal("Absensi Gagal!", "Coba Lagi Nanti Ya!", "error", {
                                button: "Okay",
                            });
                        }

                        $("#absennrp").val('');
                    }
                })
            })
        });
    </script>
@endsection
