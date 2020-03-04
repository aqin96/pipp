      <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Selamat datang <?php echo $this->session->userdata('nmuser') ?>!</h2>
              <p class="az-dashboard-text">Panel Pelabuhan Perikanan Lempasing (PP_Lempasing)</p>
            </div>
          </div><!-- az-dashboard-one-title -->
          
        <style>
        #container {
            height: 400px; 
        }
        
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
        }
        
        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
        	font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

          </style>

          <hr style="border-top: 4px solid rgb(92, 77, 251);">

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12 ht-lg-100p">

          <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-xl-12 mg-t-20 mg-md-t-0">
              <!--<canvas id="chartBar2"></canvas>-->
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        <center><a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>master/ikan">Lihat harga lainnya</a></center>
                    </p>
                </figure>
            </div><!-- col-6 -->
          </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
          
          <hr style="border-top: 4px solid rgb(92, 77, 251);"><br>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12 mg-t-20 mg-lg-t-0">

              <div class="az-content-label mg-b-5">Headline Terkini</div>
                <p class="mg-b-20">Berita terkini Pelabuhan Perikanan Lempasing (PP_Lempasing).</p>

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

                  <center><button class="btn btn-primary" onclick="location.href='<?php echo base_url() ?>listberita/page/1'">Berita lainnya</button></center>

            </div><!-- col -->
          </div><!-- row -->

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->
    
    <script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Harga Ikan'
        },
        subtitle: {
            text: 'Data Harga Ikan Berdasarkan Nama Ikan.'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Harga Ikan (Rp.)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Harga Ikan Terkini: <b>Rp. {point.y:.1f}</b>'
        },
        series: [{
            name: 'Informasi Ikan',
            data: [
                <?php foreach($ikan as $a) { ?>
                ['<?php echo $a->nmikan ?>', <?php echo $a->harga ?>],
                <?php } ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    </script>