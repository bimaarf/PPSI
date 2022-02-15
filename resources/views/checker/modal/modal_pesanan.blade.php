<div class="modal top fade" id="checker{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info Pesanan</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabs navs -->
asdasdsadsad

                <!-- Tabs content -->

                <!-- Tabs content -->
                <form method="GET" action="{{ route('driver.findByField', ['id' => $item->id]) }}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active rounded-5 p-4" id="ex1-resi-1{{ $item->id }}"
                                role="tabpanel" aria-labelledby="ex1-tab-1{{ $item->id }}"
                                style="background-color: #ffffffd7;">
                                @include('user.modal.elements.resi')

                            </div>
                            <div class="tab-pane fade" id="ex1-resi-2{{ $item->id }}" role="tabpanel"
                                aria-labelledby="ex1-tab-2{{ $item->id }}">

                                    <div id="newRow"></div>

                                    <button id="addRow" type="button" class="btn btn-info">Tambahkan Armada</button>
                                    <span class="text-danger">Jumlah Armada : </span><span id="truck"></span>


                            </div>
                        </div>
                    </div>
                    <ul class="col-lg-3 nav nav-tabs mb-3 nav-item" id="ex1" role="tablist">
                        <li class=" nav-link" role="presentation">
                            <a class="btn btn-lg btn-info rounded-5 btn-lg mt-1 text-capitalize active" id="ex1-tab-1"
                                data-mdb-toggle="tab" href="#ex1-resi-1{{ $item->id }}" role="tab"
                                aria-controls="ex1-tabs-1{{ $item->id }}" aria-selected="true"
                                style="width: 100%">Detail Pesanan</a>
                            <a class="btn btn-lg btn-success rounded-5 btn-lg mt-2 text-capitalize" id="ex1-tab-2"
                                data-mdb-toggle="tab" href="#ex1-resi-2{{ $item->id }}" role="tab"
                                aria-controls="ex1-tabs-2{{ $item->id }}" aria-selected="false"
                                style="width: 100%">Carikan Driver</a>
                            <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-4 text-capitalize"
                                style="width:100%">Bantuan</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // add row
    var i = 1;
    $("#addRow").click(function() {
        ++i;
        document.getElementById('truck').innerHTML = i;

        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<select class="form-select form-select-lg" name="armada[]" id="armada"  autocomplete="off">';
        html += '@foreach ($armadas as $armada)';
        html += '<option value="{{ $armada->id }}">{{ $armada->name }}</option>';
        html += '@endforeach ';
        html += '</select>';
        html += '<div class="input-group-append">';
        html += '<input type="number" name="jumlah[]" min="0" max="4" class="form-control" value="1">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</input>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        --i;
        document.getElementById('truck').innerHTML = i;

        $(this).closest('#inputFormRow').remove();
    });

    function finDriver(id) {
        const url       = "/field-manager/cari-driver-by-field/" + id
        var armada = $('#armada').map(function(){
            return this.value;
        }).get();
        $('#findDriver').attr('disabled', true);
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                'armada[]': armada,
            },
            success: function(response) {
                $('#findDriver').attr('disabled', false);
                $(".btn-close").click();
                $("#status").html('Driver berhasil ditemukan!');
                document.getElementById('alert-success').style.display = 'block';
            }, error: () =>  {
                $("#status").html('Driver aktif saat kurang dan tidak memenuhi syarat!');
                document.getElementById('alert-error').style.display = 'block';
            }
        });
    }
    function disabled() {
        $('#findDriver').attr('disabled', true);
    }
</script>
