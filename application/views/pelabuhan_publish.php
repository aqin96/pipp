      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <div class="az-content-label mg-b-5">
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
                  </tr>
                <?php } ?>
              </tbody>
            </table><br><br>

          </div>
      </div>
    </div><!-- az-content -->