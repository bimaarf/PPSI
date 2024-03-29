<div class="row">
    <div class="col-md-6">
        <h6 class="text-dark fw-bold">Nama Pengirim</h6>
        <p class="text-black-100 ml-4 text-capitalize">{{ $item->nama_pengirim }}</p>
        
        <h6 class="text-dark fw-bold">Resi</h6>
        <p class="text-black-100 ml-4 text-capitalize">{{ $item->key }}</p>
        
        <h6 class="text-dark fw-bold">Nomor Handphone</h6>
        <p class="text-black-100 ml-4 text-capitalize">+62{{ Auth::user()->telp }}</p>
        
        <h6 class="text-dark fw-bold">Nama Barang</h6>
        <p class="text-black-100 ml-4">{{ $item->nama_barang }}</p>
        
        <h6 class="text-dark fw-bold">Jenis Barang</h6>
        <p class="text-black-100 ml-4">{{ $item->jenis_barang }}</p>
        
        <h6 class="text-dark fw-bold">Lokasi Titik Jemput</h6>
        <p class="text-black-100 ml-4">{{ $item->jemput }}</p>
        
        <h6 class="text-dark fw-bold">Lokasi Alamat Jemput</h6>
        <p class="text-black-100 ml-4">{{ $item->alamat_jemput }}</p>
        
    </div>
    
    <div class="col-md-6 border-start">
        <h6 class="text-dark fw-bold">Nama Penerima</h6>
        @foreach (json_decode($item->nama_penerima) as $penerima)
            <p class="text-black-100 ml-4">{{ $penerima }}</p>
        @endforeach

        <h6 class="text-dark fw-bold">Rentang Waktu</h6>
        <p class="text-black-100 ml-4">{{ $item->jadwal }}</p>
        <p class="text-black-100 ml-4">
            {{ $item->start_time }}-{{ $item->arrival_time }}&emsp;WIB
        </p>
        
        <h6 class="text-dark fw-bold">Lokasi Titik Tujuan</h6>
        @foreach (json_decode($item->tujuan) as $tujuan)
            <p class="text-black-100 ml-4">{{ $tujuan }}</p>
        @endforeach

        <h6 class="text-dark fw-bold">Lokasi Alamat Tujuan</h6>
        @foreach (json_decode($item->alamat_tujuan) as $alamatTujuan)
            <p class="text-black-100 ml-4">{{ $alamatTujuan }}</p>
        @endforeach
        <h6 class="text-dark fw-bold">Total Harga</h6>
        <p class="text-black-100 ml-4 fw-bold">RP 750.000</p>
    </div>
</div>