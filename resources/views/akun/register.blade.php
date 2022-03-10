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
                <div class="row">
                    <div class="form-group">
                        <label for="name" :value="__('Name')">Username</label>
                        <input class="form-control form-control-lg" type="text" name="name" id="name"
                            :value="old('name')" required autofocus>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="email" :value="__('Email')">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" id="email"
                                :value="old('email')" placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="password" :value="__('Password')">Password</label>
                            <input class="form-control form-control-lg" type="password" name="password" id="password"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- telp --}}
                        <div class="form-group mt-2">
                            <label for="telp" :value="__('Telp')"><i
                                    class="fab fa-whatsapp text-success"></i>&nbsp;Whatsapp</label>
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">+62</span>
                                <input class="form-control" type="num" name="telp" id="telp" :value="old('telp')"
                                    required autofocus>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label for="password_confirmation" :value="__('Confirm Password')">Konfirmasi
                                Password</label>
                            <input type="password" class="form-control form-control-lg" name="password_confirmation"
                                id="password_confirmation" required>
                        </div>
                        <div class="form-group m-3 m-lg-4">
                            <input class="form-control input-form" type="text" name="role" id="role" :value="old('role')"placeholder="Role" hidden autofocus>
                        </div>


                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="alamat" :value="__('Alamat')">Alamat lengkap</label>
                    <textarea class="form-control" :value="old('alamat')" name="alamat" id="alamat" cols="30"
                        rows="5"></textarea>
                </div>
                    <button type="submit" class="btn mt-2 btn-primary float-end">Daftar</button>
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