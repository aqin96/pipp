      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data supplier berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data supplier berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data supplier berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Master Supplier</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-30p">Nama Supplier</th>
                      <th class="wd-20p">No. Telp</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($supplier as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmsupplier ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->notelp ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idsupplier="<?php echo $data->idsupplier ?>" data-nmsupplier="<?php echo $data->nmsupplier ?>" data-notelp="<?php echo $data->notelp ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteSupplier(this)" data-idsupplier="<?php echo $data->idsupplier ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>master/addsupplier">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nmsupplier" placeholder="Masukkan nama supplier" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Telp</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+62 </span>
                          </div>
                          <input type="text" name="notelp" class="form-control" placeholder="Masukkan no. telp supplier" required>
                        </div>
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

                  <form method="post" action="<?php echo base_url() ?>master/updatesupplier">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="hidden" id="idsupplier" name="idsupplier">
                        <input type="text" name="nmsupplier" id="nmsupplier" placeholder="Masukkan nama supplier" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Telp</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+62 </span>
                          </div>
                          <input type="text" id="notelp" name="notelp" class="form-control" placeholder="Masukkan no. telp supplier" required>
                        </div>
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
              var idsupplier = $(e.relatedTarget).data('idsupplier');
              var nmsupplier = $(e.relatedTarget).data('nmsupplier');
              var notelp = $(e.relatedTarget).data('notelp');
              $('#idsupplier').val(idsupplier);
              $('#nmsupplier').val(nmsupplier);
              $('#notelp').val(notelp);
            });

            function deleteSupplier(elem) {
                idsupplier = $(elem).attr("data-idsupplier");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>master/deletesupplier/"+idsupplier;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->