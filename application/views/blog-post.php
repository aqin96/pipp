      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">

            <div class="az-content-breadcrumb">
              <span>Berita</span>
              <span><?php echo $berita[0]->judul ?></span>
            </div>
            <h2><?php echo $berita[0]->judul ?></h2>
            <span style="margin-top: -10px; font-size: 12px"><?php echo date('d F Y (H:i)', strtotime($berita[0]->waktu)) ?></span><br><br>
            <img src="<?php echo $berita[0]->featuredimage ?>" style="width: 100%" alt=""><br><br>
            <p><?php echo $berita[0]->isi ?></p>
            <hr style="border-top: 4px solid rgb(92, 77, 251);">

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->