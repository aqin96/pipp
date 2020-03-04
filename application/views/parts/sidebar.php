<body>

    <div class="az-header">
      <div class="container">
        <div class="az-header-left">
          <a href="<?php echo base_url() ?>" class="az-logo" style="text-transform: uppercase;"><span></span> KKP</a>
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
          <div class="az-header-menu-header">
            <a href="<?php echo base_url() ?>dashboard" style="text-transform: uppercase;" class="az-logo"><span></span> KKP</a>
            <a href="" class="close">&times;</a>
          </div><!-- az-header-menu-header -->
          <ul class="nav">

            <?php if($this->session->userdata('iduser') != '') { ?>
            <li class="nav-item <?php if($this->navbar_Title == 'Dashboard') {echo 'active show';} ?>">
              <a href="<?php echo base_url() ?>dashboard" class="nav-link"><i class="typcn typcn-home-outline"></i> Home</a>
            </li>

            <?php } else { ?> 
            <li class="nav-item <?php if($this->navbar_Title == 'Dashboard') {echo 'active show';} ?>">
              <a href="<?php echo base_url() ?>home" class="nav-link"><i class="typcn typcn-home-outline"></i> Home</a>
            </li>
            <?php } ?>

            <?php if($this->session->userdata('iduser') != '') { ?>
            <li class="nav-item <?php if($this->navbar_Title == 'Master') {echo 'active show';} ?>">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-folder"></i> Master</a>
              <nav class="az-menu-sub">
                <a href="<?php echo base_url() ?>master/kapal" class="nav-link <?php if($this->navbarTitle == 'Kapal') {echo 'active';} ?>">Kapal</a>
                <a href="<?php echo base_url() ?>master/pelabuhan" class="nav-link <?php if($this->navbarTitle == 'Pelabuhan') {echo 'active';} ?>">Pelabuhan</a>
                <a href="<?php echo base_url() ?>master/ikan" class="nav-link <?php if($this->navbarTitle == 'Ikan') {echo 'active';} ?>">Ikan</a>
                <a href="<?php echo base_url() ?>master/jenis_perbekalan" class="nav-link <?php if($this->navbarTitle == 'Jenis Perbekalan') {echo 'active';} ?>">Jenis Perbekalan</a>
                <a href="<?php echo base_url() ?>master/supplier" class="nav-link <?php if($this->navbarTitle == 'Supplier') {echo 'active';} ?>">Supplier</a>
              </nav>
            </li>

            <?php } else { ?>

            <li class="nav-item <?php if($this->navbar_Title == 'Master') {echo 'active show';} ?>">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-folder"></i> Master</a>
              <nav class="az-menu-sub">
                <a href="<?php echo base_url() ?>publish/kapal" class="nav-link <?php if($this->navbarTitle == 'Kapal') {echo 'active';} ?>">Kapal</a>
                <a href="<?php echo base_url() ?>publish/pelabuhan" class="nav-link <?php if($this->navbarTitle == 'Pelabuhan') {echo 'active';} ?>">Pelabuhan</a>
                <a href="<?php echo base_url() ?>publish/ikan" class="nav-link <?php if($this->navbarTitle == 'Ikan') {echo 'active';} ?>">Ikan</a>
                <a href="<?php echo base_url() ?>publish/jenis_perbekalan" class="nav-link <?php if($this->navbarTitle == 'Jenis Perbekalan') {echo 'active';} ?>">Jenis Perbekalan</a>
                <a href="<?php echo base_url() ?>publish/supplier" class="nav-link <?php if($this->navbarTitle == 'Supplier') {echo 'active';} ?>">Supplier</a>
              </nav>
            </li>

            <?php } ?>

            <?php if($this->session->userdata('iduser') != '') { ?>
            <li class="nav-item <?php if($this->navbar_Title == 'Entry') {echo 'active show';} ?>">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i> Form Entry</a>
              <nav class="az-menu-sub">
                <a href="<?php echo base_url() ?>entry/produksi_harga" class="nav-link <?php if($this->navbarTitle == 'Produksi Harga') {echo 'active';} ?>">Produksi Harga</a>
                <a href="<?php echo base_url() ?>entry/perbekalan" class="nav-link <?php if($this->navbarTitle == 'Perbekalan') {echo 'active';} ?>">Perbekalan</a>
                <a href="<?php echo base_url() ?>entry/berita" class= "nav-link <?php if($this->navbarTitle == 'Berita') {echo 'active';} ?>"nav-link">Berita</a>
              </nav>
            </li>
            <?php  } ?>

            <li class="nav-item <?php if($this->navbar_Title == 'Laporan') {echo 'active show';} ?>">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Laporan</a>
              <nav class="az-menu-sub">
                      <a href="<?php echo base_url() ?>laporan/produksi_harga" class="nav-link <?php if($this->navbarTitle == 'Data Perikanan Tangkap') {echo 'active';} ?>">Data Perikanan Tangkap</a>
                      <!-- <a href="<?php echo base_url() ?>entry/perbekalan" class="nav-link <?php if($this->navbarTitle == 'Data Perbekalan') {echo 'active';} ?>">Data Perbekalan</a> -->
                </nav>
            </li>
          </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
        
        <?php if($this->session->userdata('iduser') != '') { ?>
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="<?php echo base_url() ?>assets/img/admin.png" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="<?php echo base_url() ?>assets/img/admin.png" alt="">
                </div><!-- az-img-user -->
                <h6><?php echo $this->session->userdata('nmuser') ?></h6>
                <span><?php echo $this->session->userdata('level') ?></span>
              </div><!-- az-header-profile -->

              <a href="<?php echo base_url();?>user/editprofil" class="dropdown-item"><i class="typcn typcn-edit"></i> Ubah Profil</a>
              <a href="<?php echo base_url();?>auth/logout" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Log Out</a>
            </div><!-- dropdown-menu -->
          </div>

        <?php } else { ?> 
          <button onclick="location.href='<?php echo base_url() ?>auth'" class="btn btn-primary">Login</button>
        <?php } ?>

        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->