      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <div class="az-content-label mg-b-5">
            <h4>Master Jenis Perbekalan</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Jenis</th>
                      <th class="wd-35p">Satuan</th>
                      <th class="wd-20p">Harga</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($jenis_perbekalan as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmjenis ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->satuan ?></td>
                      <td style="vertical-align: middle;">Rp. <?php echo number_format($data->harga,0,',','.'); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
      </div>
    </div><!-- az-content -->