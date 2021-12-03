<div class="row fs-5">
    <div class="col-lg-4 py-lg-2">
        <b>IP-H1</b> -&ensp;Nama Pengirim
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;<b class="text-capitalize">{{ $item->nama_pengirim }}</b>
    </div>

    {{-- breack --}}
    <div class="col-lg-4 py-lg-2">
        <b>IP-H2</b> -&ensp;No. Resi
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;10002692844212
    </div>

    {{-- breack --}}
    <div class="col-lg-4 py-lg-2">
        <b>IP-H3</b> -&ensp;Nama Barang
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;{{ $item->nama_barang }}
    </div>

    {{-- breack --}}
    <div class="col-lg-4 py-lg-2">
        <b>IP-H4</b> -&ensp;Jenis Barang
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;{{ $item->jenis_barang }}
    </div>

    {{-- breack --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H5</b> -&ensp;Dari
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;{{ $item->jemput }}
    </div>

    {{-- breack --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H6</b> -&ensp;Alamat Jemput
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;{{ $item->alamat_jemput }}
    </div>

    {{-- breack --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H7</b> -&ensp;Nama Penerima
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        @foreach (json_decode($item->nama_penerima) as $penerima)
            <b>IP-H7.{{ $loop->iteration }}</b> -&ensp;{{ $penerima }} <br>
        @endforeach
    </div>

    {{-- breack --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H8</b> -&ensp;Tujuan
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        @foreach (json_decode($item->tujuan) as $tujuan)
        <b>IP-H8.{{ $loop->iteration }}</b> -&ensp;{{ $tujuan }} <br>
        @endforeach
    </div>
    
    {{-- break --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H9</b> -&ensp;Alamat Tujuan
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>

    {{-- break --}}
    <div class="col-7 py-lg-2">
        @foreach (json_decode($item->alamat_tujuan) as $aTujuan)
            <b>IP-H9.{{ $loop->iteration }}</b> -&ensp;{{ $aTujuan }} <br>
        @endforeach
    </div>

    {{-- break --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H10</b> -&ensp;Rentang Waktu
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;{{ $item->jadwal }}&emsp;{{ $item->start_time }}&nbsp;s/d&nbsp;{{ $item->arrival_time }}&nbsp;WIB
    </div>

    {{-- break --}}

    <div class="col-lg-4 py-lg-2">
        <b>IP-H11</b> -&ensp;<b>Total Harga</b>
    </div>
    <div class="col-1 py-lg-2">
        :
    </div>
    <div class="col-7 py-lg-2">
        &emsp;&emsp;&emsp;<b class="text-capitalize">Rp 750.000</b>
    </div>
</div>