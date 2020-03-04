      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <div class="az-content-label mg-b-5">
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
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
      </div>
    </div><!-- az-content -->