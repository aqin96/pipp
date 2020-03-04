      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data perbekalan berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data perbekalan berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data perbekalan berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Entry Perbekalan</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-20p">Jenis Perbekalan</th>
                      <th class="wd-20p">Supplier</th>
                      <th class="wd-15p">Volume</th>
                      <th class="wd-15p">Harga</th>
                      <th class="wd-20p">Total Harga</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($perbekalan as $data) {
                $harga = $data->harga;
                $volume = $data->volume;
                $totalharga = $harga * $volume;
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmjenis ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmsupplier ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->volume ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($data->harga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($totalharga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idperbekalan="<?php echo $data->idperbekalan ?>" data-idjenis="<?php echo $data->idjenis ?>" data-idsupplier="<?php echo $data->idsupplier ?>" data-volume="<?php echo $data->volume ?>" data-harga="<?php echo $data->harga ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deletePerbekalan(this)" data-idperbekalan="<?php echo $data->idperbekalan ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>entry/addperbekalan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Jenis Perbekalan</label>
                        <select name="idjenis" class="form-control idjenis">
                        <?php
                          foreach ($jenis as $data) { ?>
                          <option value="<?php echo $data->idjenis ?>"><?php echo $data->nmjenis ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Supplier</label>
                        <select name="idsupplier" class="form-control">
                        <?php
                          foreach ($supplier as $data) { ?>
                          <option value="<?php echo $data->idsupplier ?>"><?php echo $data->nmsupplier ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Volume</label>
                        <input type="text" name="volume" pattern="[0-9]*" oninput=" if(value.length>7)value= value.slice(0,7)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' placeholder="Masukkan volume" class="form-control volume" value="1" required>
                      </div>
                      <div class="form-group">
                        <label>Total Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" name="harga" class="form-control harga" value="<?php echo $jenis[0]->harga ?>" readonly required>
                        </div>
                        <small>Harga per <span class="satuan"><?php echo $jenis[0]->satuan ?></span> : <span id="hargasatuan">Rp. <?php echo number_format($jenis[0]->harga,0,',','.'); ?></span><input type="hidden" name="hargasatuan" class="hargasatuan" value="<?php echo $jenis[0]->harga ?>"></small>
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

                  <form method="post" action="<?php echo base_url() ?>entry/updateperbekalan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Jenis Perbekalan</label>
                        <input type="hidden" name="idperbekalan" id="idperbekalan">
                        <select name="idjenis" id="idjenis" class="form-control">
                        <?php
                          foreach ($jenis as $data) { ?>
                          <option value="<?php echo $data->idjenis ?>"><?php echo $data->nmjenis ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Supplier</label>
                        <select name="idsupplier" id="idsupplier" class="form-control">
                        <?php
                          foreach ($supplier as $data) { ?>
                          <option value="<?php echo $data->idsupplier ?>"><?php echo $data->nmsupplier ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Volume</label>
                        <input type="text" name="volume" id="volume" pattern="[0-9]*"oninput=" if(value.length>4)value= value.slice(0,4)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' placeholder="Masukkan volume" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Total Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" name="harga" id="harga" class="form-control" readonly required>
                        </div>
                        <small>Harga per <span id="satuan"></span> : <span id="harga_satuan"></span><input type="hidden" name="hargasatuan" class="harga_satuan"></small>
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
            $('.volume').keyup(function(){
              if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
              }
              var volume = $('.volume').val();
              var harga = $('.hargasatuan').val();
              var total = parseInt(volume) * parseInt(harga);
              $('.harga').val(total);
            });

            $('.idjenis').change(function(){
              var idjenis = $(this).find('option:selected').val();
              var jenis = $.ajax({
              async: true,
              url: "<?php echo base_url() ?>entry/getHargaJenis/"+idjenis,
              type: "POST",
              data:{idjenis:idjenis},
              dataType: "JSON",
              success: function (data){
                var harga = data.harga;
                var satuan = data.satuan;
                $('#hargasatuan').text(convertToRupiah(harga));
                $('.hargasatuan').val(harga);
                var volume = $('.volume').val();
                var harga = $('.hargasatuan').val();
                var satuan = $('.satuan').text(satuan);
                var total = parseInt(volume) * parseInt(harga);
                $('.harga').val(total);
              },
              complete: function (data){
                jenis.abort();
              },
              error: function (data){
                jenis.abort();
              }
              });
            });

            $('#volume').keyup(function(){
              if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
              }
              var volume = $('#volume').val();
              var harga = $('.harga_satuan').val();
              var total = parseInt(volume) * parseInt(harga);
              $('#harga').val(total);
            });

            $('#idjenis').change(function(){
              var idjenis = $(this).find('option:selected').val();
              var jenis = $.ajax({
              async: false,
              url: "<?php echo base_url() ?>entry/getHargaJenis/"+idjenis,
              type: "POST",
              data:{idjenis:idjenis},
              dataType: "JSON",
              success: function (data){
                var harga = data.harga;
                var satuan = data.satuan;
                $('#harga_satuan').text(convertToRupiah(harga));
                $('.harga_satuan').val(harga);
                var volume = $('#volume').val();
                var harga = $('.harga_satuan').val();
                var satuan = $('#satuan').text(satuan);
                var total = parseInt(volume) * parseInt(harga);
                $('#harga').val(total);
              },
              complete: function (data){
                jenis.abort();
              },
              error: function (data){
                jenis.abort();
              }
              });
            });

            $('#ubahdata').on('show.bs.modal', function(e) {
              var idperbekalan = $(e.relatedTarget).data('idperbekalan');
              var idjenis = $(e.relatedTarget).data('idjenis');
              var idsupplier = $(e.relatedTarget).data('idsupplier');
              var volume = $(e.relatedTarget).data('volume');
              var harga = $(e.relatedTarget).data('harga');
              var totalharga = parseInt(volume) * parseInt(harga);
              $('#idperbekalan').val(idperbekalan);
              $('#idjenis').val(idjenis).change();
              $('#idsupplier').val(idsupplier).change();
              $('#volume').val(volume);
              $('#harga_satuan').text(convertToRupiah(harga));
              $('.harga_satuan').val(harga);
              $('#harga').val(totalharga);
            });

            function convertToRupiah(angka)
            {
              var rupiah = '';    
              var angkarev = angka.toString().split('').reverse().join('');
              for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
              return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
            }

            function deletePerbekalan(elem) {
                idperbekalan = $(elem).attr("data-idperbekalan");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>entry/deleteperbekalan/"+idperbekalan;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->