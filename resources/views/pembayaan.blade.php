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
                            <h2>Verifikasi Pembayaran</h2>
                            <div class="mb-4" style="background-color: #3F3259;height:3px;width:100px"></div>
                            <form action="/bayar" id="fverifikasi"   enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="form-group">
                                    <label>NRP/Noreg*</label>
                                    <input type="text" class="form-control" name="nrp" required placeholder="NRP/Noreg">
                                </div>
                                <div class="form-group">
                                    <label>Bukti Pembayaran</label>
                                    <div class="dropzone" id="myDropzone" name="bukti" action="/bayar" style="background-color: white;border:2px dashed #3F3259;">
                                        <ion-icon name="documents-outline"  style="color: #3F3259;font-size:32pt"></ion-icon>
                                        <h5 style="color: #3F3259">Drag & Drop Files Here</h5>
                                    </div>
                                    <small>*Tipe file jepg | jpg | png</small>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-success rounded-pill  mt-3" id="btn"  style="background-color: #3F3259;">Verifikasi Pembayaran</button>
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
        window.onload = function() {
            var dropzone = new Dropzone("#myDropzone",{
                acceptedFiles: ".jpeg,.jpg,.png",
                autoProcessQueue: false,
                maxFiles:1,
                maxFilesize: 1,
                addRemoveLinks: true,
                 // Update selector to match your button

            });
            $("#btn").click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url:"/checkNRP",
                        data:$('#fverifikasi').serialize(),
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(e){
                            if(e==1){
                                dropzone.processQueue();
                            }
                            else{
                                toastr.options.positionClass = "toast-top-right";
                                toastr.options.closeButton = "true";

                                toastr.error("NRP/Noreg tidak terdaftar!");
                            }
                            $('#fverifikasi').trigger("reset");
                        }
                    })

            });

                dropzone.on('sending', function(file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $('#fverifikasi').serializeArray();
                    console.log(data);
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });
                dropzone.on("complete", function(file) {
                    dropzone.removeFile(file);
                    toastr.options.positionClass = "toast-top-right";
                    toastr.options.closeButton = "true";
                    toastr.success("Pembayaran Berhasil");
                    $('#fverifikasi').trigger("reset");

                });
        }
/*
        $('#fverifikasi').on('submit',(function(e) {

            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url:"/bayar",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(e){
                    if(e==1){
                        toastr.options.positionClass = "toast-top-right";
                        toastr.options.closeButton = "true";

                        toastr.success("Pembayaran Berhasil");
                    }
                    else{
                        toastr.options.positionClass = "toast-top-right";
                        toastr.options.closeButton = "true";

                        toastr.error("NRP/Noreg tidak terdaftar!");
                    }
                    $('#fverifikasi').trigger("reset");
                }
            })
        }))
*/
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        </script>
@endsection
