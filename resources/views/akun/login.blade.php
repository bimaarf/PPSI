<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Masuk</title>

  <!-- Favicons -->
  <!-- <link href="" rel="icon"> -->

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/akun.css') }}">

</head>

<body>
    <div class="miring position-fixed bg-danger"></div>

    <div class="card rounded shadow mx-auto row card-akun">
        <div class="col-lg-6 col-md-6 rounded-left image-akun">
          <img src="{{ asset('assets/img/landing/Logo2.png') }}" alt="" class="logo-mitruck">
        </div>
        <div class="col-lg-6 col-md-6 card-body p-5 body-akun">
            <h2 class="card-title mt-5 text-center">Masuk</h2>
            <form action="#" class="login-form mx-lg-3 mx-lg-4">
              <div class="form-group m-4">
                <input type="text" class="form-control input-form" placeholder="No.Hp" required>
              </div>
              <div class="form-group m-4">
                <input type="password" class="form-control input-form" placeholder="Password" required>
              </div>
              <div class="form-group mx-sm-0 mx-md-4 mx-lg-4 row align-items-center check">
                <div class="form-check col-sm-6 col-md-7 col-lg-7 pr-0 remember">
                  <input type="checkbox" value="remember-me" id="remember-me" class="form-check-input">
                  <label for="remember-me">Ingat saya</label>
                </div>
                <div class="col-5 px-0 login-button">
                  <button class="btn btn-primary float-end" type="submit">Masuk</button>
                </div>
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
  <script src="{{ asset('assets/js/akun.js') }}"></script>
</body>

</html>