<div class="az-footer ht-40">
      <div class="container ht-100p pd-t-0-f">
        <span>&copy; 2019 - KKP</span>
      </div><!-- container -->
    </div><!-- az-footer -->

    <script src="<?php echo base_url() ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/ionicons/ionicons.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/peity/jquery.peity.min.js"></script>

    <script src="<?php echo base_url() ?>assets/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/chart.flot.sampledata.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dashboard.sampledata.js"></script>
    
    <script>
    $(function(){
    'use strict';
    var ctx2 = document.getElementById('chartBar2').getContext('2d');
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [
        <?php
        foreach ($nama_ikan as $a) {
        echo '"'.$a->nmikan.'",';
        } ?>
        ],
        datasets: [{
          label: 'Total Tangkapan',
          data: [
          <?php
          foreach ($harga_ikan as $b) {
          echo ''.$b->harga_tangkap.',';
          } ?>
          ],
          backgroundColor: 'rgba(0,123,255,.5)'
        }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false,
            labels: {
              display: false
            }
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              fontSize: 10,
              max: 180000
            }
          }],
          xAxes: [{
            barPercentage: 0.6,
            ticks: {
              beginAtZero:true,
              fontSize: 11
            }
          }]
        }
      }
    });
    });
    </script>

    <script>
      $(function(){
        'use strict'

        $('#example1').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#example2').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>