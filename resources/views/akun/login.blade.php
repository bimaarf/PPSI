<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>mitruck</title>

  <!-- Favicons -->
  <!-- <link href="" rel="icon"> -->

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/akun.css') }}">
  {{-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> --}}

</head>

<body>
    {{-- <img src="{{ asset('assets/img/landing/2 Masuk.png') }}" alt="" width="100%"> --}}
    <div class="miring position-fixed bg-danger">
    </div>
    <div class="card rounded shadow mx-auto row card-akun">
        <div class="col-lg-6 card-header rounded-left image-akun"></div>
        <div class="col-lg-6 card-body p-5 body-akun">
            <h2 class="card-title mt-5 text-center">Masuk</h2>
            <form action="#" class="login-form mx-5">
              <div class="form-group m-4">
                <input type="text" class="form-control login-form" placeholder="No.Hp" required>
              </div>
              <div class="form-group m-4">
                <input type="password" class="form-control login-form" placeholder="Password" required>
              </div>
              <div class="form-group mx-4 row">
                <div class="form-check col-8">
                  <input type="checkbox" value="remember-me" id="remember-me" class="form-check-input">
                  <label for="remember-me">Ingat saya</label>
                </div>
                <button class="col-4 btn btn-primary" type="submit">Masuk</button>
              </div>
              <div class="form-group mx-4"><a href="#">Lupa Password?</a></div>
              <div class="m-3">
                <span class="line-center-text">atau </span>
              </div>
              <div class="form-group mx-4">
                <button type="submit" class="btn btn-warning w-100">Daftar</button>
              </div>
            </form>
        </div>
    </div>
  <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
  <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
</body>

</html>