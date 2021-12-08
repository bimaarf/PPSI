  <div class="modal top fade" id="proses{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Tabs navs -->

  
  <!-- Tabs content -->
  
  <!-- Tabs content -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active rounded-5 p-4"id="ex1-tabs-1" role="tabpanel"
                          aria-labelledby="ex1-tab-1" style="background-color: #ffffffd7;">
                        @include('user.modal.elements.resi')

                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        @include('user.modal.elements.track')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                          {{-- chat box --}}
                            <div class="card">
                              <div class="card-body">
                                  <div>
                                    <img src="{{ asset('assets/icon/Driver.svg') }}" width="30" alt="">
                                    <h6>Driver 1</h6>
                                  </div>
                                  <div>
                                    <img src="{{ asset('assets/icon/Driver.svg') }}" width="30" alt="">
                                    <h6>Driver 1</h6>
                                  </div>
                                  <div>
                                    <img src="{{ asset('assets/icon/Driver.svg') }}" width="30" alt="">
                                    <h6>Driver 1</h6>
                                  </div>
                              </div>
                            </div>
                          {{-- chat box --}}
                        </div>
                      </div>
                </div>
                <div class="col-lg-3 border-start">
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1"role="tab"aria-controls="ex1-tabs-1" aria-selected="true"
                              >Detail Pesanan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false"
                            >Lacak Pesanan</a
                          >
                        </li>
                        <li class="nav-item" role="presentation">
                          <a
                            class="nav-link"
                            id="ex1-tab-3"
                            data-mdb-toggle="tab"
                            href="#ex1-tabs-3"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                            >Tab 3</a
                          >
                        </li>
                      </ul>
                      <!-- Tabs navs -->
                    {{-- <a href="{{ route('orders.tracking', ['id'=>$item->id]) }}" class="btn btn-success rounded-5 btn-lg text-capitalize" style="width:100%">Lacak</a> --}}
                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-1 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

