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
        <div class="col-lg-6 col-md-6 card-body p-5 p-md-4 p-lg-5 body-akun">
            <h2 class="card-title text-center">Register</h2>
            <form action="{{ route('register') }}" method="POST" class="login-form mx-lg-3 mx-lg-4">
                @csrf
                <div class="form-group m-3 m-lg-4">
                    <input class="form-control input-form" type="text" name="role" id="role" :value="old('role')"placeholder="Role" hidden autofocus>
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input class="form-control input-form" type="text" name="name" id="name" :value="old('name')"placeholder="Nama Pengguna" required autofocus>
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input class="form-control input-form" type="email" name="email" id="email" :value="old('email')" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input type="text" class="form-control input-form" :value="old('alamat')" name="alamat" id="alamat" placeholder="Alamat" required autofocus>
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input type="number" class="form-control input-form" name="telp" id="telp"  :value="old('telp')" placeholder="628XXXX" required autofocus>
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input type="password" class="form-control input-form" name="password" id="password" placeholder="Password" required autocomplete="new-password">
                </div>
                <div class="form-group m-3 m-lg-4">
                    <input type="password" class="form-control input-form" name="password_confirmation" id="password_confirmation" required placeholder="Konfirmasi Password">
                </div>
                <div class="form-group mx-sm-0 mx-md-4 mx-lg-4 row align-items-center check">
                    <div class="form-check col-sm-6 col-md-7 col-lg-7 p-0 remember order-2 order-sm-1 mt-2"> <h6>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></h6>  
                        
                    </div>
                    <div class="col-5 px-0 login-button order-1 order-sm-2 mb-2 mb-sm-0">
                        <button type="submit" class="btn btn-primary float-end">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger float-end position-fixed message-error" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <script src="{{ asset('assets/js/akun.js') }}"></script>
    <script>
        const nilainya = new URLSearchParams(window.location.search)
        const nilai = nilainya.get('role')
        role = document.getElementById('role')
        role.value = nilai
    </script>
</body>

</html>