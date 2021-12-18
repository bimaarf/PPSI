  <div class="modal top fade" id="proses{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Info Pesanan</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Tabs navs -->

  
  <!-- Tabs content -->
  
  <!-- Tabs content -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active rounded-5 p-4"id="ex1-resi-1" role="tabpanel"
                          aria-labelledby="ex1-tab-1" style="background-color: #ffffffd7;">
                        @include('user.modal.elements.resi')

                        </div>
                        <div class="tab-pane fade" id="ex1-resi-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        @include('user.modal.elements.track')
                        </div>
                      </div>
                </div>
                  <ul class="col-lg-3 nav nav-tabs mb-3 nav-item" id="ex1" role="tablist">
                      <li class=" nav-link" role="presentation">
                          <a class="btn btn-lg btn-info rounded-5 btn-lg mt-1 text-capitalize active" id="ex1-tab-1" data-mdb-toggle="tab" 
                          href="#ex1-resi-1"role="tab"aria-controls="ex1-tabs-1" aria-selected="true" style="width: 100%"
                            >Detail Pesanan</a>
                            <a class="btn btn-lg btn-success rounded-5 btn-lg mt-1 text-capitalize" id="ex1-tab-2" data-mdb-toggle="tab" 
                            href="#ex1-resi-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false" style="width: 100%"
                              >Lacak Pesanan</a>
                              <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-4 text-capitalize" style="width:100%">Bantuan</a>
                      </li>
                    </ul>
            </div>
        </div>
      </div>
    </div>
  </div>

