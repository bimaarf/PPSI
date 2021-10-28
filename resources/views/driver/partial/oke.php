{{--  --}}
                                                         <?php
                                                         $alamat = $item->orders->alamat_tujuan;
                                                         $jumlah_alamat = json_decode($alamat, true);
                                                         if (count($jumlah_alamat) > 1) {
                                                             for ($x = 0; $x < count($jumlah_alamat); $x++) {
                                                                
                                                                 ?>
                                                               
                                                                 <form action="" method="post">
                                                                     @csrf
                                                                     <div class="form-group mt-2 ">
                                                                         <label for="alamat">Alamat</label>
                                                                         <input class="form-control" type="text"
                                                                             name="alamat" value="{{ $almt }}">
                                                                         
                                                                             <button type="submit"
                                                                             class="btn btn-outline-primary mt-2 ">
                                                                             Konfirmasi
                                                                         </button>
                                                                     </div>
                                                                 </form>
 
                                                                 <?php 
                                                             }
                                                         }
                                                         
                                                         ?>

                                                         {{--  --}}