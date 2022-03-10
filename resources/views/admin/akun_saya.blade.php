@extends('admin.main')
@section('akun-saya', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Akun Saya</b>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="text-capitalize float-left text-dark">Profil Kamu</h4>
                    <a href="#" onclick="sunting()" id="sunting" class="float-right btn btn-info text-capitalize"><i
                            class="fas fa-pen-alt"></i>&ensp;
                        Sunting Profil</a>
                </div>
                @include('akun.sunting')
                <div class="card-body " id="body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h5 class="text-dark">Jenis Akun</h5>
                            @if (Auth::user()->hasrole('admin'))
                                <p class="text-success fw-bold ml-4 text-capitalize">Admin</p>
                            @endif
                            @if (Auth::user()->hasrole('super-admin'))
                                <p class="text-danger fw-bold ml-4 text-capitalize">Super Admin</p>
                            @endif

                            <h5 class="text-dark">Nama Lengkap</h5>
                            <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->name }}</p>
                            <h5 class="text-dark">Nomor Handphone</h5>
                            <p class="text-black-100 ml-4 text-capitalize">+62{{ Auth::user()->telp }}</p>
                            <h5 class="text-dark">Email</h5>
                            <p class="text-black-100 ml-4">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <h5 class="text-dark">Alamat</h5>
                    <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->alamat }}</p>
                    <h5 class="text-dark">Status</h5>
                    <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->status->status }}</p>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="text-capitalize float-left text-dark">Hak Akses</h4>
                </div>
                <div class="card-body">
                    @foreach ($permission_user->where('user_id', Auth::user()->id) as $permission)
                        <div class="form-check form-switch mt-2">
                            <input type="checkbox" class="form-check-input" checked disabled>
                            <label class="text-black">
                                {{ $permission->permission->display_name }} </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
<script>
    var condition = true;

    function sunting() {
        if (condition == true) {
            document.getElementById('form').style.display = 'block';
            document.getElementById('body').style.display = 'none';
            condition = false;

        } else if (condition == false) {
            document.getElementById('form').style.display = 'none';
            document.getElementById('body').style.display = 'block';
            condition = true;
        }
        console.log(condition);

    }
</script>
