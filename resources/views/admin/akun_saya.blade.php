@extends('admin.main')
@section('akun-saya', 'active')
@section('content')
<div class="card shadow-none rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Akun Saya</b>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mt-2 shadow-none">
                <div class="p-4 card-header">
                    <div class="float-left">
            
                        <h4 class="text-capitalize fw-bold text-dark">Profil Kamu</h4>
                    </div>
                    <div class="float-right">
                        <a href="#" onclick="sunting()" id="sunting" class="btn btn-outline-info fw-bold text-capitalize">
                            Perbarui Profil</a>
                        <a href="#" onclick="batal()" id="backs" class="btn btn-outline-info fw-bold d-none text-capitalize">
                            Batal</a>
                    </div>
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
            <div class="card shadow-none mt-2">
                <div class="card-header p-4">
                    <h4 class="text-capitalize float-left text-dark fw-bold">Hak Akses</h4>
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
    function sunting() {
        $('#body').addClass('d-none');
        $('#form').removeClass('d-none');
        $('#sunting').addClass('d-none');
        $('#backs').removeClass('d-none');
    }
    function batal() {
        $('#body').removeClass('d-none');
        $('#form').addClass('d-none');
        $('#backs').addClass('d-none');
        $('#sunting').removeClass('d-none');
    }

</script>
