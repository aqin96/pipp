      <?php 
      $no = 0;
      foreach ($tangkapan as $row) {
      ?>
      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data item tangkapan berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data item tangkapan berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data item tangkapan berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Item Tangkap - <?php echo date('d F Y', strtotime($row->waktu)) ?> (<?php echo $row->nmkapal ?>)</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-20p">Nama Ikan</th>
                      <th class="wd-20p">Berat (Kg)</th>
                      <th class="wd-25p">Harga Satuan (Rp)</th>
                      <th class="wd-25p">Total Harga</th>
                      <th class="wd-5p"></th>
                      <th class="wd-5p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($detail as $data) {
                $no++;
                $harga = $data->harga;
                $qty = $data->qty;
                $totalharga = $harga * $qty; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmikan ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->qty ?> Kg</td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($data->harga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($totalharga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-iditem="<?php echo $data->iditem ?>" data-idtangkapan="<?php echo $data->idtangkapan ?>" data-idikan="<?php echo $data->idikan ?>" data-qty="<?php echo $data->qty ?>" data-harga="<?php echo $data->harga ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteItem(this)" data-iditem="<?php echo $data->iditem ?>" data-idtangkapan="<?php echo $data->idtangkapan ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <!-- MODAL EFFECTS -->
            <div id="tambahdata" class="modal fade effect-sign">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                  <div class="modal-header">
                    <h6 class="modal-title">Tambah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form method="post" action="<?php echo base_url() ?>entry/additem">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih Ikan</label>
                        <input type="hidden" name="idtangkapan" value="<?php echo $row->idtangkapan ?>">
                        <select name="idikan" class="form-control idikan">
                          <?php
                          foreach ($ikan as $data) { ?>
                          <option value="<?php echo $data->idikan ?>"><?php echo $data->nmikan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Qty (Kg)</label>
                        <input type="text" name="qty" pattern="[0-9]*"oninput=" if(value.length>4)value= value.slice(0,4)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' placeholder="Masukkan qty" class="form-control qty" value="1" required>
                      </div>
                      <div class="form-group">
                        <label>Total Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" name="harga" class="form-control harga" value="<?php echo $ikan[0]->harga ?>" readonly required>
                        </div>
                        <small>Harga satuan : <span id="hargasatuan">Rp. <?php echo number_format($ikan[0]->harga,0,',','.'); ?></span><input type="hidden" name="hargasatuan" class="hargasatuan" value="<?php echo $ikan[0]->harga ?>"></small>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-indigo">Simpan</button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                    </div>
                  </form>
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->

            <!-- MODAL EFFECTS -->
            <div id="ubahdata" class="modal fade effect-sign">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                  <div class="modal-header">
                    <h6 class="modal-title">Edit Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form method="post" action="<?php echo base_url() ?>entry/updateitem">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih Ikan</label>
                        <input type="hidden" name="iditem" id="iditem">
                        <input type="hidden" name="idtangkapan" id="idtangkapan">
                        <select name="idikan" class="form-control" id="idikan">
                          <?php
                          foreach ($ikan as $data) { ?>
                          <option value="<?php echo $data->idikan ?>"><?php echo $data->nmikan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Qty (Kg)</label>
                        <input type="text" name="qty" pattern="[0-9]*"oninput=" if(value.length>4)value= value.slice(0,4)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' placeholder="Masukkan qty" class="form-control" id="qty" required>
                      </div>
                      <div class="form-group">
                        <label>Total Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" name="harga" class="form-control" id="harga" value="" readonly required>
                        </div>
                        <small>Harga satuan : <span id="harga_satuan"></span><input type="hidden" name="hargasatuan" class="harga_satuan"></small>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-indigo">Update</button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                    </div>
                  </form>
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->

            <script type="text/javascript">
            $('.qty').keyup(function(){
              if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
              }
              var qty = $('.qty').val();
              var harga = $('.hargasatuan').val();
              var total = parseInt(qty) * parseInt(harga);
              $('.harga').val(total);
            });

            $('.idikan').change(function(){
              var idikan = $(this).find('option:selected').val();
              var ikan = $.ajax({
              async: true,
              url: "<?php echo base_url() ?>entry/getHargaIkan/"+idikan,
              type: "POST",
              data:{idikan:idikan},
              dataType: "JSON",
              success: function (harga){
                $('#hargasatuan').text(convertToRupiah(harga));
                $('.hargasatuan').val(harga);
                var qty = $('.qty').val();
                var harga = $('.hargasatuan').val();
                var total = parseInt(qty) * parseInt(harga);
                $('.harga').val(total);
              },
              complete: function (harga){
                ikan.abort();
              },
              error: function (harga){
                ikan.abort();
              }
              });
            });

            $('#qty').keyup(function(){
              if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
              }
              var qty = $('#qty').val();
              var harga = $('.harga_satuan').val();
              var total = parseInt(qty) * parseInt(harga);
              $('#harga').val(total);
            });

            $('#idikan').change(function(){
              var idikan = $(this).find('option:selected').val();
              var ikan = $.ajax({
              async: false,
              url: "<?php echo base_url() ?>entry/getHargaIkan/"+idikan,
              type: "POST",
              data:{idikan:idikan},
              dataType: "JSON",
              success: function (harga){
                $('#harga_satuan').text(convertToRupiah(harga));
                $('.harga_satuan').val(harga);
                var qty = $('#qty').val();
                var harga = $('#harga_satuan').val();
                var total = parseInt(qty) * parseInt(harga);
                $('#harga').val(total);
              },
              complete: function (harga){
                ikan.abort();
              },
              error: function (harga){
                ikan.abort();
              }
              });
            });

            $('#ubahdata').on('show.bs.modal', function(e) {
              var iditem = $(e.relatedTarget).data('iditem');
              var idtangkapan = $(e.relatedTarget).data('idtangkapan');
              var qty = $(e.relatedTarget).data('qty');
              var harga = $(e.relatedTarget).data('harga');
              var totalharga = parseInt(qty) * parseInt(harga);
              var idikan = $(e.relatedTarget).data('idikan');
              $('#iditem').val(iditem);
              $('#idtangkapan').val(idtangkapan);
              $('#idikan').val(idikan).change();
              $('#harga_satuan').text(convertToRupiah(harga));
              $('.harga_satuan').val(harga);
              $('#harga').val(totalharga);
              $('#qty').val(qty);
            });

            function deleteItem(elem) {
                iditem = $(elem).attr("data-iditem");
                idtangkapan = $(elem).attr("data-idtangkapan");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>entry/deleteitem/"+iditem+'/'+idtangkapan;
                }
            }

            function convertToRupiah(angka)
            {
              var rupiah = '';    
              var angkarev = angka.toString().split('').reverse().join('');
              for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
              return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->
    <?php } ?>