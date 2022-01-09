<div class="card-body" id="form" style="display: none">
    <form action="{{ route('auth.sunting') }}" class="row" method="post">
        @csrf
        <div class="col-lg-5">
            <div class="text-center">
                <img src="{{ asset('assets/icon/'. Auth::user()->avatar)  }}" class="img-fluid rounded mt-4" width="200vh"
                    alt="">
                <h4 class="text-capitalize text-dark mt-4"><strong>{{ Auth::user()->name }}</strong></h4>
                <h5 class="text-lowercase text-dark">{{ Auth::user()->email }}</h5>
                <h6 >Ubah Password</h6>
                <div class="form-group">
                    <input class="inp" id="password" name="password" autocomplete="new-password" placeholder="Password baru" required/>
                </div>
                <div class="form-group">
                    <input class="inp" id="password_confirmation" name="password_confirmation"
                     placeholder="Konfirmasi password" required/>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <label class="fw-bold" for="username">Username</label>
                <input class="form-control form-control-lg" value="{{ Auth::user()->name }}" type="text" id="username" name="name" required>
            </div>
            <div class="form-group mt-2">
                <label class="fw-bold" for="email">Email</label>
                <input class="form-control form-control-lg" value="{{ Auth::user()->email }}" type="text" id="email" name="email" required>
            </div>
            <div class="form-group mt-2">
                <label class="fw-bold" for="telp">Nomor Handphone</label>
                <input class="form-control form-control-lg" value="{{ Auth::user()->telp }}" type="text" id="telp" name="telp">
            </div>
            <div class="form-group mt-2">
                <label class="fw-bold" for="alamat">Alamat Lengkap</label>
                <textarea class="form-control form-control-lg" name="alamat" id="alamat"
                    rows="5" required>{{ Auth::user()->alamat }}</textarea>
            </div>
            <input type="submit" value="Simpan Perubahan" class="text-capitalize px-4 btn btn-success mt-2 fa-pull-right">
        </div>
    </form>
</div>