      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="col-md-12">

          <div class="az-content-label mg-b-5">
            <h4>Master Kapal</h4>
          </div>

          <br>
          
          <center><img src="https://cdn.pixabay.com/photo/2017/01/30/14/11/cutter-2020911_960_720.png" style="width:200px"></center><br>

            <table id="example1" class="table table-bordered table-hover dt-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th class="wd-10p">No.</th>
                      <th class="wd-35p">Nama Kapal</th>
                      <th class="wd-20p">Status</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                foreach ($kapal as $data) {
                $no++; ?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $no ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->nmkapal ?></td>
                      <td style="vertical-align: middle;"><?php echo $data->status ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table><br><br>

          </div>
      </div>
    </div><!-- az-content -->