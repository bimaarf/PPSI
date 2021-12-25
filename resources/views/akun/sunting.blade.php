<div class="card-body" id="form" style="display: none">
    <form action="" class="row" method="post">
        @csrf
        <div class="col-lg-5">
            <div class="text-center">
                <img src="{{ asset('assets/icon/Driver.svg') }}" class="img-fluid rounded mt-4" width="200vh"
                    alt="">
                <h4 class="text-capitalize text-dark mt-4"><strong>{{ Auth::user()->name }}</strong></h4>
                <h5 class="text-lowercase text-dark">{{ Auth::user()->email }}</h5>
                <h6 >Ubah Password</h6>
                <div class="form-group">
                    <input class="inp" placeholder="Password baru" />
                </div>
                <div class="form-group">
                    <input class="inp" placeholder="Konfirmasi password" />
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-outline">
                <input class="form-control form-control-lg" value="{{ Auth::user()->name }}" type="text" id="username" name="name" required>
                <label class="form-label" for="username">Username</label>
            </div>
            <div class="form-outline mt-4">
                <input class="form-control form-control-lg" value="{{ Auth::user()->email }}" type="text" id="email" name="email" required>
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-outline mt-4">
                <input class="form-control form-control-lg" value="{{ Auth::user()->telp }}" type="text" id="telp" name="telp">
                <label class="form-label" for="telp">Nomor Handphone</label>
            </div>
            <div class="form-outline mt-4">
                <textarea class="form-control form-control-lg" name="alamat" id="alamat"
                    rows="5" required>{{ Auth::user()->alamat }}</textarea>
                <label class="form-label" for="alamat">Alamat Lengkap</label>
            </div>
            <input type="submit" value="Simpan Perubahan" class="text-capitalize px-4 btn btn-success mt-2 fa-pull-right">
        </div>
    </form>
</div>