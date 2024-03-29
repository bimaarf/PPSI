<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Masuk</title>


  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/akun.css') }}">

</head>

<body>
    <div class="miring-top position-fixed bg-danger"></div>
    <div class="miring-bottom position-fixed bg-danger"></div>

    <div class="card rounded shadow mx-auto row card-akun">

        <div class="col-lg-6 col-md-6 rounded-left image-akun">
          <img src="{{ asset('assets/img/Logo2.png') }}" alt="" class="logo-mitruck logo-white">
          <img src="{{ asset('assets/img/Logo3.png') }}" alt="" class="logo-mitruck logo-black">
        </div>
        <div class="col-lg-6 col-md-6 card-body p-5 body-akun">
            <h2 class="card-title text-center mx-4 mx-md-0 mx-lg-4 mt-2 mt-lg-4">Temui truk Anda, dan muat!</h2>
            <form method="POST" action="{{ route('login') }}" class="login-form mx-lg-3 mx-lg-4">
              @csrf

              <!-- Email Address -->
              <div class="form-group m-4">
                <input id="email" type="email" :value="old('email')" name="email" class="form-control input-form" placeholder="Email" required autofocus>
              </div>

              <!-- Password -->
              <div class="form-group m-4">
                <input id="password" name="password" type="password" class="form-control input-form" placeholder="Password" required autocomplete="current-password">
              </div>

              <div class="form-group mx-sm-0 mx-md-4 mx-lg-4 row align-items-center check">

                <!-- Remember Me -->
                <div class="form-check col-sm-6 col-md-7 col-lg-7 pr-0 remember">
                  <input type="checkbox" value="remember-me" id="remember-me" class="form-check-input">
                  <label for="remember-me">Ingat saya</label>
                </div>

                <!-- Login Button -->
                <div class="col-5 px-0 login-button">
                  <x-button class="btn btn-primary float-end">
                    {{ __('Masuk') }}
                  </x-button>
                </div>
              </div>

              <div class="form-group mx-4 mt-4">
                  @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}">
                          {{ __('Lupa Password?') }}
                      </a>
                  @endif
              </div>
              <div class="m-3">
                <span class="line-center-text">atau </span>
              </div>
              <div class="form-group text-center btn-daftar">
                <div class="btn btn-warning daftar">Daftar</div>
              </div>
            </form>
        </div>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger float-end position-absolute message-error" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

    <div class="position-absolute w-100 h-100 top-0 left-0 row align-items-center m-0 go-regis d-none">
      <div class="choice card rounded mx-auto w-75 p-5 pt-0">
        <div class="tutup position-relative mb-2 mt-1">
          <h4 class="float-end">X</h4>
        </div>
        <div class="row align-items-center">
          <a href="{{ route('register') }}?role=shipper" class="go-shipper btn btn-lg btn-outline-black col-12 col-md-5 m-2 m-md-auto">Shipper</a>
          <a href="{{ route('register') }}?role=driver" class="go-driver btn btn-lg btn-outline-black col-12 col-md-5 m-2 m-md-auto">Driver</a>
        </div>
      </div>
    </div>

  <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
  <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
  <script src="{{ asset('assets/js/akun.js') }}"></script>
  <script>
    const tutup = document.querySelector('.tutup')
    const daftar = document.querySelector('.daftar')
    const goRegis = document.querySelector('.go-regis')
    tutup.addEventListener('click', () => {
        goRegis.classList.add('d-none')
    })
    daftar.addEventListener('click', () => {
        goRegis.classList.remove('d-none')
    })
  </script>
</body>

</html>
