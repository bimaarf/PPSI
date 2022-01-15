<div class="row">
    <div class="col-md-6">
        <h6 class="text-dark fw-bold">Nama Pengirim</h6>
        <p class="text-black-100 ml-4 text-capitalize">{{ $order->nama_pengirim }}</p>
        
        <h6 class="text-dark fw-bold">Resi</h6>
        <p class="text-black-100 ml-4 text-capitalize">{{ $order->key }}</p>
        
        <h6 class="text-dark fw-bold">Nomor Handphone</h6>
        <p class="text-black-100 ml-4 text-capitalize">+62{{ Auth::user()->telp }}</p>
        
        <h6 class="text-dark fw-bold">Nama Barang</h6>
        <p class="text-black-100 ml-4">{{ $order->nama_barang }}</p>
        
        <h6 class="text-dark fw-bold">Jenis Barang</h6>
        <p class="text-black-100 ml-4">{{ $order->jenis_barang }}</p>
        
        <h6 class="text-dark fw-bold">Lokasi Titik Jemput</h6>
        <p class="text-black-100 ml-4">{{ $order->jemput }}</p>
        
        <h6 class="text-dark fw-bold">Lokasi Alamat Jemput</h6>
        <p class="text-black-100 ml-4">{{ $order->alamat_jemput }}</p>
        
    </div>
    
    <div class="col-md-6 border-start">
        <h6 class="text-dark fw-bold">Nama Penerima</h6>
        @foreach (json_decode($order->nama_penerima) as $penerima)
            <p class="text-black-100 ml-4">{{ $penerima }}</p>
        @endforeach

        <h6 class="text-dark fw-bold">Rentang Waktu</h6>
        <p class="text-black-100 ml-4">{{ $order->jadwal }}</p>
        <p class="text-black-100 ml-4">
            {{ $order->start_time }}-{{ $order->arrival_time }}&emsp;WIB
        </p>
        
        <h6 class="text-dark fw-bold">Lokasi Titik Tujuan</h6>
        @foreach (json_decode($order->tujuan) as $tujuan)
            <p class="text-black-100 ml-4">{{ $tujuan }}</p>
        @endforeach

        <h6 class="text-dark fw-bold">Lokasi Alamat Tujuan</h6>
        @foreach (json_decode($order->alamat_tujuan) as $alamatTujuan)
            <p class="text-black-100 ml-4">{{ $alamatTujuan }}</p>
        @endforeach
        <h6 class="text-dark fw-bold">Total Harga</h6>
        <p class="text-black-100 ml-4 fw-bold">RP 750.000</p>
    </div>
</div>