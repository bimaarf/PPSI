<!-- Modal -->
<div class="modal top fade" id="jalur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog   modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Rute & Armada</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('driver.armada') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        @foreach ($armadas as $armada)
                            <div class="col-6 hilang">
                                <div class="form-check">
                                    <input type="checkbox" name="armada_id[]" value="{{ $armada->id }}"
                                        id="{{ $armada->id }}" @foreach ($driverArmada as $dArmada)
                                    @if ($dArmada->armada_id == $armada->id)
                                        checked='checked'
                                    @endif
                        @endforeach
                        >
                        <label for="{{ $armada->id }}">{{ $armada->name }}</label>
                    </div>
            </div>
            @endforeach

            <div class="row">
                <div class="col-lg-12">

                    <p>Jumlah Rute : <span type="text" id="inc">{{ $ruteCount }}
                    </p>
                    @if ($ruteCount > 0)
                        @foreach ($rutes as $rute)
                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <select class="form-select form-select-lg" name="rute[]" id="jalur"
                                        autocomplete="off">
                                        @foreach ($zones as $zone)

                                            <option value="{{ $zone->zone }}" @if ($rute == $zone->zone) selected @endif>
                                                {{ $zone->zone }}</option>

                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <small class="text-danger font-italic">*anda belum memilih jalur!</small>
                    @endif

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info">Tambah Jalur</button>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                Tutup
            </button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    // add row
    var i = 1;
    var c = {{ $ruteCount }};
    $("#addRow").click(function() {
        ++i;
        if (c < 1) {
            document.getElementById('inc').innerHTML = c + i;

        } else if (c > 0) {

            document.getElementById('inc').innerHTML = c + i;
        }
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<select class="form-select form-select-lg" name="rute[]" id="rute"  autocomplete="off">'
        @foreach ($zones as $zone)'
            html += '<option value="{{ $zone->zone }}">{{ $zone->zone }}</option>'
            html += '@endforeach '
        html += '</select>'
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        --i;
        // document.getElementById('inc').innerHTML=c-a;
        if (i < 1) {
            document.getElementById('inc').innerHTML = c + i;

        } else if (i > 0) {
            document.getElementById('inc').innerHTML = c + i + 0;

        }
        $(this).closest('#inputFormRow').remove();
    });
</script>
