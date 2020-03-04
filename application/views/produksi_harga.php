      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data tangkapan berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data tangkapan berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data tangkapan berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Entry Produksi Harga</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-20p">Nama Kapal</th>
                      <th class="wd-20p">Nama Pelabuhan</th>
                      <th class="wd-20p">Waktu</th>
                      <th class="wd-25p">Total (Rp)</th>
                      <th class="wd-25p">Total (Kg)</th>
                      <th class="wd-5p"></th>
                      <th class="wd-5p"></th>
                      <th class="wd-5p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($tangkapan as $data) {
                $idtangkapan = $data->idtangkapan;
                $total = $this->db->query("SELECT SUM(item_tangkap.harga) as totaltangkapan FROM item_tangkap where item_tangkap.idtangkapan = '$idtangkapan'")->row()->totaltangkapan;
                $berat = $this->db->query("SELECT SUM(item_tangkap.qty) as totalberat FROM item_tangkap where item_tangkap.idtangkapan = '$idtangkapan'")->row()->totalberat;
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmkapal ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmpelabuhan ?></td>
                      <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($data->waktu)) ?></td>
                      <td style="vertical-align: middle;"><?php if($total == 0) {echo '<h7 style="color:red">Item belum diinput</h7>';} else { ?>Rp. <?php echo number_format($total,0,',','.'); } ?></td>
                      <td style="vertical-align: middle;"><?php if($berat == 0) {echo '<h7 style="color:red">Item belum diinput</h7>';} else { ?><?php echo $berat.' Kg'; } ?></td>
                      <td style="vertical-align: middle;"><center><button onclick="detailTangkapan(this)" data-idtangkapan="<?php echo $data->idtangkapan ?>" type="button" class="btn btn-info">Detail</button></center></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idtangkapan="<?php echo $data->idtangkapan ?>" data-idkapal="<?php echo $data->idkapal ?>" data-idpelabuhan="<?php echo $data->idpelabuhan ?>" data-waktu="<?php echo date('Y-m-d', strtotime($data->waktu)) ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteTangkapan(this)" data-idtangkapan="<?php echo $data->idtangkapan ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" action="<?php echo base_url() ?>entry/addtangkapan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih Kapal</label>
                        <select name="idkapal" class="form-control">
                          <?php
                          foreach ($kapal as $data) { ?>
                          <option value="<?php echo $data->idkapal ?>"><?php echo $data->nmkapal ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pilih Pelabuhan</label>
                        <select name="idpelabuhan" class="form-control">
                          <?php
                          foreach ($pelabuhan as $data) { ?>
                          <option value="<?php echo $data->idpelabuhan ?>"><?php echo $data->nmpelabuhan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Waktu</label>
                        <input type="date" name="waktu" class="form-control" required>
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

                  <form method="post" action="<?php echo base_url() ?>entry/updatetangkapan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih Kapal</label>
                        <input type="hidden" name="idtangkapan" id="idtangkapan">
                        <select name="idkapal" id="idkapal" class="form-control">
                          <?php
                          foreach ($kapal as $data) { ?>
                          <option value="<?php echo $data->idkapal ?>"><?php echo $data->nmkapal ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pilih Pelabuhan</label>
                        <select name="idpelabuhan" class="form-control" id="idpelabuhan">
                          <?php
                          foreach ($pelabuhan as $data) { ?>
                          <option value="<?php echo $data->idpelabuhan ?>"><?php echo $data->nmpelabuhan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Waktu</label>
                        <input type="date" name="waktu" id="waktu" class="form-control" required>
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
              var idtangkapan = $(e.relatedTarget).data('idtangkapan');
              var idkapal = $(e.relatedTarget).data('idkapal');
              var idpelabuhan = $(e.relatedTarget).data('idpelabuhan');
              var waktu = $(e.relatedTarget).data('waktu');
              $('#idtangkapan').val(idtangkapan);
              $('#idkapal').val(idkapal).change();
              $('#idpelabuhan').val(idpelabuhan).change();
              $('#waktu').val(waktu);
            });

            function deleteTangkapan(elem) {
                idtangkapan = $(elem).attr("data-idtangkapan");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>entry/deletetangkapan/"+idtangkapan;
                }
            }

            function detailTangkapan(elem) {
                idtangkapan = $(elem).attr("data-idtangkapan");
                window.location.href = "<?php echo base_url() ?>entry/item_tangkap/"+idtangkapan;
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->