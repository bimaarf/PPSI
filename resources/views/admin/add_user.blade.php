@extends('admin.main')
@section('add', 'active')
@section('content')
    <div class="card shadow-none rounded">
        <div class="card-body">
            <div class="fs-5">
                <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Registrasi</b>
            </div>
        </div>
    </div>
    <div id="alert-js" class="alert alert-success text-center mt-3" style="display: none;">
        <p id="status"></p>
    </div>

    <form action="{{ route('admin.register') }}" method="GET" id="form-register">
        @csrf
        <div class="row">
            <div class="col-lg-7 mt-2">
                <div class="card shadow-none">
                    <div class="card-body">
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
                                    <input class="form-control form-control-lg" type="password" name="password"
                                        id="password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-select form-select-lg"
                                        onclick="fieldManager()">

                                        <option value="admin">Admin</option>
                                        <option value="feed-manager">Field Manager</option>

                                    </select>
                                    <div class="form-group mt-4">
                                        <label for="password_confirmation" :value="__('Confirm Password')">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control form-control-lg"
                                            name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                </div>

                                {{-- telp --}}
                                <label for="telp" :value="__('Telp')"><i
                                        class="fab fa-whatsapp text-success"></i>&nbsp;Whatsapp</label>
                                <div class="input-group input-group-lg mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">+62</span>
                                    <input class="form-control" type="num" name="telp" id="telp" :value="old('telp')"
                                        required autofocus>
                                </div>


                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="alamat" :value="__('Alamat')">Alamat lengkap</label>
                            <textarea class="form-control" :value="old('alamat')" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                        </div>
                        <button id="submit" onclick="reigster()"
                            class="btn btn-primary mt-4 fa-pull-right">Register</button>
                        <button id="submit-error" class="d-none" type="submit">Register</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-2" id="hak-akses">
                <div class="card shadow-none">
                    <div class="card-body">
                        @foreach ($permission as $permis)
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input permission-user" type="checkbox" id="{{ $permis->name }}"
                                    name="permission[]" value="{{ $permis->name }}">
                                <label class="form-check-label" for="{{ $permis->name }}">
                                    {{ $permis->display_name }}</label>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function reigster() {
            const url = "/admin/registrasi-user-proses"
            const formRegister = "#form-register"

            var permission = $('.permission-user').map(function() {
                return this.value;
            }).get();

            $('.btn').attr('disabled', true);
            $.ajax({
                url: url,
                type: "GET",
                data: $(formRegister).serialize(),
                'permission[]': permission,
                error: function(response) {
                    $('#submit-error').click();
                    $('.btn').attr('disabled', false);
                },
                success: function(response) {
                    $('#status').html('Berhasil ditambahkan!');
                    document.getElementById('alert-js').style.display = 'block';
                    $(formRegister).get(0).reset();
                    $('.btn').attr('disabled', false);
                }
            })
        };

        function fieldManager() {
            if ($("#role").val() == 'feed-manager') {
                $('#hak-akses').addClass('d-none');
            } else {
                $('#hak-akses').removeClass('d-none');
            }
        };
    </script>
@endsection
