<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Daftar</title>

  <!-- Favicons -->
  <!-- <link href="" rel="icon"> -->

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/akun.css') }}">
</head>

<body>
    <div class="miring-top position-fixed bg-danger"></div>
    <div class="miring-bottom position-fixed bg-danger"></div>

    <div class="card rounded shadow mx-auto row card-akun">
        <div class="col-lg-6 col-md-6 rounded-left image-akun">
          <img src="{{ asset('assets/img/landing/Logo2.png') }}" alt="" class="logo-mitruck logo-white">
          <img src="{{ asset('assets/img/landing/Logo3.png') }}" alt="" class="logo-mitruck logo-black">
        </div>
        <div class="col-lg-6 col-md-6 card-body p-5 body-akun">
            <h2 class="card-title text-center mx-4">Meet your truck, and load!</h2>
            <form action="#" class="login-form mx-lg-3 mx-lg-4">
                <div class="form-group m-4">
                    <input type="text" class="form-control input-form" placeholder="Nama Pengguna" required>
                </div>
                <div class="form-group m-4">
                    <input type="text" class="form-control input-form" placeholder="Alamat" required>
                </div>
                <div class="form-group m-4">
                    <input type="number" class="form-control input-form" placeholder="No.Hp" required>
                </div>
                <div class="form-group m-4">
                    <input type="password" class="form-control input-form" placeholder="Password" required>
                </div>
                <div class="form-group mx-sm-0 mx-md-4 mx-lg-4 row align-items-center check">
                    <div class="form-check col-sm-6 col-md-7 col-lg-7 p-0 remember order-2 order-sm-1 mt-2"> <h6>Sudah punya akun? <a href="#">Masuk</a></h6>  
                        
                    </div>
                    <div class="col-5 px-0 login-button order-1 order-sm-2 mb-2 mb-sm-0">
                        <button class="btn btn-primary float-end">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
  <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
  <script src="{{ asset('assets/js/akun.js') }}"></script>

</body>

</html>