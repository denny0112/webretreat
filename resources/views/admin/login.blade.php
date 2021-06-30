@extends('layout')

@section('body')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-0 col-md-2"></div>
            <div class="col-12  col-md-8 col-lg-8">
                <div class="card card-body shadow mt-5 p-0 mb-5" style="background-image: url({{asset('BG-CARD.png')}});background-size: cover;">
                    <div class="row p-3 p-lg-0 ">
                        <div class="col-12 col-md-12  col-lg-6 p-5 text-center my-auto" >
                            <h1 style="font-size: 62pt;color:white">I'M FOUND.</h1>
                            <p style="color:white">Menjadi generasi yang mengalami perubahan hidup dan menyadari bahwa
                                segala sesuatu bersumber dari Tuhan</p>
                            <a href="https://www.instagram.com/pd.istts/" class="btn  rounded-pill  mt-2" style="background-color:  rgb(225,48,108);color:white;"> <ion-icon name="logo-instagram" class="align-middle"></ion-icon> pd.istts </a>
                        </div>
                        <div class="col-12 col-md-12  col-lg-6 p-5" style="background-color: white;">
                            <h2 class="mt-5">Masuk Admin</h2>
                            <div class="mb-4" style="background-color: #3F3259;height:3px;width:100px"></div>
                            <form action="/" id="flogin" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required placeholder="Password">
                                </div>

                                <div class="form-group mt-3 mb-5">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success rounded-pill pl-4 pr-4"  type="button" onclick="daftar()"  style="background-color: #3F3259;"><ion-icon name="paper-plane-outline" class="align-middle"></ion-icon> Masuk</button>
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
                url:"/login",
                data:$('#flogin').serialize(),
                success:function(e){
                    if(e==1){
                        window.location.href = "/dashboard";
                    }
                    else{
                        toastr.options.positionClass = "toast-top-right";
                        toastr.options.closeButton = "true";
                        toastr.error("Username/Password Salah!");
                    }
                    $('#fregis').trigger("reset");
                }
            })
        }
    </script>
@endsection
