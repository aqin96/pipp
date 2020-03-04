      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data ikan berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data ikan berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data ikan berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Master Ikan</h4>
          </div>
        
          <br>
          
          <center><img src="https://i.pinimg.com/736x/a3/a3/02/a3a302a2a45417308911b70b71eb4f89.jpg" style="width:200px"></center><br>
            
            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Ikan</th>
                      <th class="wd-20p">Harga</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($ikan as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmikan ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($data->harga,0,',','.'); ?></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idikan="<?php echo $data->idikan ?>" data-nmikan="<?php echo $data->nmikan ?>" data-harga="<?php echo $data->harga ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteIkan(this)" data-idikan="<?php echo $data->idikan ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>master/addikan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Ikan</label>
                        <input type="text" name="nmikan" placeholder="Masukkan nama ikan" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" placeholder="Masukkan harga ikan" pattern="[0-9]*"oninput=" if(value.length>7)value= value.slice(0,7)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' class="form-control">
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

                  <form method="post" action="<?php echo base_url() ?>master/updateikan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Ikan</label>
                        <input type="hidden" id="idikan" name="idikan">
                        <input type="text" name="nmikan" id="nmikan" placeholder="Masukkan nama ikan" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" placeholder="Masukkan harga ikan" pattern="[0-9]*"oninput=" if(value.length>7)value= value.slice(0,7)" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode) ) )' class="form-control">
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
              var idikan = $(e.relatedTarget).data('idikan');
              var nmikan = $(e.relatedTarget).data('nmikan');
              var harga = $(e.relatedTarget).data('harga');
              $('#idikan').val(idikan);
              $('#nmikan').val(nmikan);
              $('#harga').val(harga);
            });

            function deleteIkan(elem) {
                idikan = $(elem).attr("data-idikan");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>master/deleteikan/"+idikan;
                }
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->