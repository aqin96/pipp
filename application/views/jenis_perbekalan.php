      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data jenis berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data jenis berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data jenis berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Master Jenis Perbekalan</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Jenis</th>
                      <th class="wd-35p">Satuan</th>
                      <th class="wd-20p">Harga</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($jenis_perbekalan as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmjenis ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->satuan ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($data->harga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idjenis="<?php echo $data->idjenis ?>" data-nmjenis="<?php echo $data->nmjenis ?>" data-idsatuan="<?php echo $data->idsatuan ?>" data-harga="<?php echo $data->harga ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteJenis(this)" data-idjenis="<?php echo $data->idjenis ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>master/addjenis">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Jenis Perbekalan</label>
                        <input type="text" name="nmjenis" placeholder="Masukkan nama jenis" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Satuan Unit</label>
                        <select name="idsatuan" class="form-control">
                          <?php
                          foreach ($satuan as $data) { ?>
                          <option value="<?php echo $data->idsatuan ?>"><?php echo $data->satuan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" placeholder="Masukkan harga jenis" pattern="[0-9]*"oninput=" if(value.length>7)value= value.slice(0,7)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' class="form-control">
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

                  <form method="post" action="<?php echo base_url() ?>master/updatejenis">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Jenis Perbekalan</label>
                        <input type="hidden" id="idjenis" name="idjenis">
                        <input type="text" name="nmjenis" id="nmjenis" placeholder="Masukkan nama jenis" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Satuan Unit</label>
                        <select name="idsatuan" id="idsatuan" class="form-control">
                          <?php
                          foreach ($satuan as $data) { ?>
                          <option value="<?php echo $data->idsatuan ?>"><?php echo $data->satuan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" placeholder="Masukkan harga jenis" pattern="[0-9]*"oninput=" if(value.length>7)value= value.slice(0,7)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' class="form-control">
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
            $('#ubahdata').on('show.bs.modal', function(e) {
              var idjenis = $(e.relatedTarget).data('idjenis');
              var nmjenis = $(e.relatedTarget).data('nmjenis');
              var idsatuan = $(e.relatedTarget).data('idsatuan');
              var harga = $(e.relatedTarget).data('harga');
              $('#idjenis').val(idjenis);
              $('#nmjenis').val(nmjenis);
              $('#idsatuan').val(idsatuan).change();
              $('#harga').val(harga);
            });

            function deleteJenis(elem) {
                idjenis = $(elem).attr("data-idjenis");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>master/deletejenis/"+idjenis;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->