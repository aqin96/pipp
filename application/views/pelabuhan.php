      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data pelabuhan berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data pelabuhan berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data pelabuhan berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Master Pelabuhan</h4>
          </div>

          <br>
          
          <center><img src="https://i.ya-webdesign.com/images/pier-vector-boat-dock-1.png" style="width:200px"></center><br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Pelabuhan</th>
                      <th class="wd-20p">Alamat</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($pelabuhan as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmpelabuhan ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->alamat ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idpelabuhan="<?php echo $data->idpelabuhan ?>" data-nmpelabuhan="<?php echo $data->nmpelabuhan ?>" data-alamat="<?php echo $data->alamat ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deletePelabuhan(this)" data-idpelabuhan="<?php echo $data->idpelabuhan ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>master/addpelabuhan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Pelabuhan</label>
                        <input type="text" name="nmpelabuhan" placeholder="Masukkan nama pelabuhan" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan alamat pelabuhan"></textarea>
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

                  <form method="post" action="<?php echo base_url() ?>master/updatepelabuhan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Pelabuhan</label>
                        <input type="hidden" id="idpelabuhan" name="idpelabuhan">
                        <input type="text" name="nmpelabuhan" id="nmpelabuhan" placeholder="Masukkan nama pelabuhan" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
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
              var idpelabuhan = $(e.relatedTarget).data('idpelabuhan');
              var nmpelabuhan = $(e.relatedTarget).data('nmpelabuhan');
              var alamat = $(e.relatedTarget).data('alamat');
              $('#idpelabuhan').val(idpelabuhan);
              $('#nmpelabuhan').val(nmpelabuhan);
              $('#alamat').val(alamat);
            });

            function deletePelabuhan(elem) {
                idpelabuhan = $(elem).attr("data-idpelabuhan");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>master/deletepelabuhan/"+idpelabuhan;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->