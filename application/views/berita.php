      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <?php if ($this->session->flashdata('inserted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data berita berhasil ditambahkan.
              </div>
          <?php } elseif ($this->session->flashdata('updated')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data berita berhasil diupdate.
              </div>
          <?php } elseif ($this->session->flashdata('deleted')){ ?>
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> Data berita berhasil dihapus.
              </div>
          <?php } ?>

          <div class="az-content-label mg-b-5">
            <a style="float: right; width: 150px" href="#tambahdata" class="modal-effect btn btn-dark btn-block" data-toggle="modal" data-effect="effect-sign">Tambah Data</a>
            <h4>Entry Berita</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-20p"></th>
                      <th class="wd-30p">Judul Berita</th>
                      <th class="wd-20p">Waktu Pos</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($berita as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><img src="<?php echo $data->featuredimage ?>" style="width: 100px"></td>
                      <td style="vertical-align: middle;"><?php echo $data->judul ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->waktu ?></td>
                      <td style="vertical-align: middle;"><center><button onclick="detailBerita(this)" data-idberita="<?php echo $data->idberita ?>" type="button" class="btn btn-info">Detail</button></center></td>
                      <td style="vertical-align: middle;"><center><a href="#ubahdata" data-idberita="<?php echo $data->idberita ?>" data-judul="<?php echo $data->judul ?>" data-isi="<?php echo $data->isi ?>" data-featuredimage="<?php echo $data->featuredimage ?>" data-toggle="modal" data-effect="effect-sign" class="btn btn-primary">Edit</a></center></td>
                      <td style="vertical-align: middle;"><center><button onclick="deleteBerita(this)" data-idberita="<?php echo $data->idberita ?>" type="button" class="btn btn-danger">Hapus</button></center></td>
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

                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>entry/addberita">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" placeholder="Masukkan judul berita" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Gambar Unggulan</label>
                        <input type="file" name="featuredimage" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" rows="5" placeholder="Masukkan isi berita" class="form-control"></textarea>
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

                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>entry/updateberita">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="hidden" name="idberita" id="idberita">
                        <input type="text" name="judul" id="judul" placeholder="Masukkan judul berita" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Gambar Unggulan</label>
                        <small>(Note : Abaikan input ini jika tidak ingin mengubah gambar)</small><br>
                        <image id="featured_image" style="width: 100px">
                        <input type="file" name="featuredimage" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" id="isi" rows="5" placeholder="Masukkan isi berita" class="form-control"></textarea>
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
              var idberita = $(e.relatedTarget).data('idberita');
              var judul = $(e.relatedTarget).data('judul');
              var isi = $(e.relatedTarget).data('isi');
              var featuredimage = $(e.relatedTarget).data('featuredimage');
              $('#idberita').val(idberita);
              $('#judul').val(judul);
              $('#isi').val(isi);
              $('#featured_image').attr('src', featuredimage);
            });

            function deleteBerita(elem) {
                idberita = $(elem).attr("data-idberita");
                var ask = window.confirm("Yakin ingin menghapus data ini?");
                if (ask) {
                  window.location.href = "<?php echo base_url() ?>entry/deleteberita/"+idberita;
                }
            }

            function detailBerita(elem) {
                idberita = $(elem).attr("data-idberita");
                  window.location.href = "<?php echo base_url() ?>berita/"+idberita;
            }
            </script>

          </div>
      </div>
    </div><!-- az-content -->