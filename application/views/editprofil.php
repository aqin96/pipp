      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Selamat datang <?php echo $this->session->userdata('nmuser') ?>!</h2>
              <p class="az-dashboard-text">Panel Pusat Informasi Pelabuhan Perikanan.</p>
            </div>
          </div><!-- az-dashboard-one-title -->

          <hr>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12 mg-t-20 mg-lg-t-0">

              <div class="az-content-label mg-b-5">Edit Profil</div>
                
              <br>
              <form method="post" action="<?php echo base_url() ?>dashboard/updateprofil">

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nmuser" class="form-control" placeholder="Masukkan nama anda" value="<?php echo $user[0]->nmuser ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" value="<?php echo $user[0]->username ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label> <small>(Abaikan input ini jika tidak ingin mengubah password)</small>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password anda">
                  </div>

                <br>

                  <center><button type="submit" class="btn btn-primary">Update Profil</button></center>

                </form>

            </div><!-- col -->
          </div><!-- row -->

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->