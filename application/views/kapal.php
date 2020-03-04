      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data kapal berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data kapal berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data kapal berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Master Kapal</h4>
          </div>

          <br>
          
          <center><img src="https://cdn.pixabay.com/photo/2017/01/30/14/11/cutter-2020911_960_720.png" style="width:200px"></center><br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Kapal</th>
                      <th class="wd-20p">Status</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($kapal as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmkapal ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->status ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idkapal="<?php echo $data->idkapal ?>" data-nmkapal="<?php echo $data->nmkapal ?>" data-status="<?php echo $data->status ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteKapal(this)" data-idkapal="<?php echo $data->idkapal ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table><br><br>

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

                  <form method="post" action="<?php echo base_url() ?>master/addkapal">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Kapal</label>
                        <input type="text" name="nmkapal" placeholder="Masukkan nama kapal" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <br>
                        <input type="radio" name="status" value="Aktif" checked> &nbsp;Aktif&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="Nonaktif"> &nbsp;Nonaktif<br>
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

                  <form method="post" action="<?php echo base_url() ?>master/updatekapal">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Kapal</label>
                        <input type="hidden" id="idkapal" name="idkapal">
                        <input type="text" name="nmkapal" id="nmkapal" placeholder="Masukkan nama kapal" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <br>
                        <input type="radio" name="status" value="Aktif" checked> &nbsp;Aktif&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="Nonaktif"> &nbsp;Nonaktif<br>
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
              var idkapal = $(e.relatedTarget).data('idkapal');
              var nmkapal = $(e.relatedTarget).data('nmkapal');
              var status = $(e.relatedTarget).data('status');
              $('#idkapal').val(idkapal);
              $('#nmkapal').val(nmkapal);
              $("input[name=status][value='" + status + "']").prop("checked",true);
            });

            function deleteKapal(elem) {
                idkapal = $(elem).attr("data-idkapal");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>master/deletekapal/"+idkapal;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->