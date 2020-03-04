      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Selamat datang <?php echo $this->session->userdata('nmuser') ?>!</h2>
              <p class="az-dashboard-text">Panel Pelabuhan Perikanan Lempasing (PP_Lempasing)</p>
            </div>
          </div><!-- az-dashboard-one-title -->

          <hr>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12 mg-t-20 mg-lg-t-0">

              <div class="az-content-label mg-b-5">Berita</div>
              <br>

                <div class="row row-sm">

                  <?php
                  foreach ($berita as $data) { ?>
                  <div class="col-md-6 col-lg-4">
                    <div class="card bd-0">
                      <a href="<?php echo base_url() ?>berita/<?php echo $data->idberita ?>"><img class="img-fluid" src="<?php echo $data->featuredimage ?>" alt="Image"></a>
                      <div class="card-body bd bd-t-0">
                        <a href="<?php echo base_url() ?>berita/<?php echo $data->idberita ?>"><h4><?php echo $data->judul ?></h4></a>
                        <span><?php echo date('d F Y (H:i)', strtotime($data->waktu)) ?></span><br><br>
                        <p class="card-text"><?php echo $data->isi ?></p>
                      </div>
                    </div><!-- card -->
                  </div><!-- col-4 -->
                  <?php } ?>

                </div><!-- row -->

                <br>

                  <center>
                    
                    <nav aria-label="Page navigation example">
                      <ul class="pagination pagination-sm ">
                      <?php
                      // Batas data per halaman
                      $batas = 6;
                      // Total halaman (Pembulatan dari total kelas dibagi dengan batas data per halaman)
                      $totalhalaman = ceil($totalberita/$batas);
                      if($totalberita == 0) {
                        echo '';
                      }
                      else {
                        $page = $this->uri->segment('3');
                        if($page == 'listberita') $page = 1;
                        $next = $page + 1;
                        $prev = $page - 1;
                        // jika halaman aktif kurang dari 2
                        if($page < 2){ ?>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">Awal</span>
                            <span class="sr-only">Awal</span>
                          </a>
                        </li>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons"><i class="fa fa-arrow-left"></i></span>
                            <span class="sr-only">Sebelumnya</span>
                          </a>
                        </li>
                        <?php }
                        // jika halaman aktif lebih dari atau sama dengan 2
                        else { ?>
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url() ?>listberita/page/1" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">Awal</span>
                            <span class="sr-only">Awal</span>
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url() ?>listberita/page/<?php echo $prev ?>" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons"><i class="fa fa-arrow-left"></i></span>
                            <span class="sr-only">Sebelumnya</span>
                          </a>
                        </li>
                        <?php }

                        // Tambahkan triple dots       
                        if($page > 1) { ?>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span class="sr-only">...</span>
                          </a>
                        </li>
                        <?php }

                        // Nomor halaman dinamis (1,2,3,...n)
                        for ($i=$page; $i < $page + 3; $i++) { 
                          if($i > $page) break;
                          elseif($page == $i) { ?>
                            <li class="page-item active">
                              <a class="page-link" href="<?php echo base_url() ?>listberita/page/<?php echo $i ?>" aria-label="1">
                                <span><?php echo $i ?></span>
                              </a>
                            </li>
                          <?php }
                          elseif($page != $i) { ?>
                            <li class="page-item">
                              <a class="page-link" href="<?php echo base_url() ?>listberita/page/<?php echo $i ?>" aria-label="1">
                                <span><?php echo $i ?></span>
                              </a>
                            </li>
                          <?php }
                        }

                        // Tambahkan triple dots      
                        if($page+$batas+$batas < $totalhalaman) { ?>
                          <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span class="sr-only">...</span>
                            </a>
                          </li>
                        <?php }

                        // Aturan untuk next and last button
                        if($page < $totalhalaman) { ?>
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url() ?>listberita/page/<?php echo $next ?>" aria-label="Next">
                            <span class="sr-only">Selanjutnya</span>
                            <span aria-hidden="true" class="material-icons"><i class="fa fa-arrow-right"></i></span>
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url() ?>listberita/page/<?php echo $totalhalaman ?>" aria-label="Next">
                            <span class="sr-only">Akhir</span>
                            <span aria-hidden="true" class="material-icons">Akhir</span>
                          </a>
                        </li>
                        <?php }
                        else { ?>

                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Next">
                            <span class="sr-only">Selanjutnya</span>
                            <span aria-hidden="true" class="material-icons"><i class="fa fa-arrow-right"></i></span>
                          </a>
                        </li>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Next">
                            <span class="sr-only">Akhr</span>
                            <span aria-hidden="true" class="material-icons">Akhir</span>
                          </a>
                        </li>
                        
                        <?php }
                      }
                      ?>
                      </ul>
                    </nav>

                  </center>

            </div><!-- col -->
          </div><!-- row -->

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->