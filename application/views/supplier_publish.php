      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <div class="az-content-label mg-b-5">
            <h4>Master Supplier</h4>
          </div>

          <br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-30p">Nama Supplier</th>
                      <th class="wd-20p">No. Telp</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($supplier as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmsupplier ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->notelp ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
      </div>
    </div><!-- az-content -->