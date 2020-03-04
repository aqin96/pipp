<?php
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
 
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$base_url = base_url();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$range = basename($actual_link);

if($range != 'cetak_laporan') {
$array = explode (":", $range);  
$tglawal = $array[0]; 
$tglakhir = $array[1]; 
$tglawal_ = date("Y-m-d", strtotime($tglawal));
$tglakhir_ = date("Y-m-d", strtotime($tglakhir));
$tgl_awal = tgl_indo(date("Y-m-d", strtotime($tglawal)));
$tgl_akhir = tgl_indo(date("Y-m-d", strtotime($tglakhir)));
}
$today = tgl_indo(date("Y-m-d"));

if($range == 'cetak_laporan') $rentang = '';
if($range != 'cetak_laporan') $rentang = $tgl_awal.' - '.$tgl_akhir;
// $kodepesanan = substr($b->kodepesanan,4,7);
// $time = tgl_indo(date("Y-m-d", strtotime($b->waktu)));
// $idpesanan = $b->idpesanan;
// $rowpesanan = $this->db->query("SELECT pesanan.biaya as totalpesanan FROM pesanan where pesanan.idpesanan = $idpesanan")->result();
// $biaya = number_format($rowpesanan[0]->totalpesanan,0,",",".");
$strhtml = '<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>PIPP - Laporan</title>
    
    <style type="text/css">
  .clearfix:after {
  content: "";
  display: table;
  clear: both;
  }

  a {
    color: #5D6975;
    text-decoration: underline;
  }

  body {
    position: relative;
    width: 21cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    font-family: Arial;
  }

  header {
    padding: 10px 0;
    margin-bottom: 30px;
  }

  #logo {
    text-align: center;
    margin-bottom: 10px;
  }

  #logo img {
    width: 90px;
  }

  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 1.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 0 20px 0;
    background: url("dimension.png");
  }

  #project {
    float: left;
  }

  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }

  #company {
    float: right;
    text-align: right;
  }

  #project div,
  #company div {
    white-space: nowrap;        
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }

  table th,
  table td {
    text-align: center;
  }

  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: normal;
  }

  table .service,
  table .desc {
    text-align: left;
  }

  table td {
    padding: 20px;
    text-align: right;
  }

  table td.service,
  table td.desc {
    vertical-align: top;
    font-size: 1em;
  }

  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1em;
  }

  table td.grand {
    border-top: 1px solid #5D6975;;
  }

  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }

  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
  }
  </style>
</head>

<body>
    <header class="clearfix">
      <div id="logo">
        <img src="'.$base_url.'assets/img/logo.png">
      </div>
      <h1>Laporan Tangkapan '.$rentang; 
      $strhtml .='</h1>
      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No.</th>
            <th class="desc">Nama Kapal</th>
            <th class="desc">Nama Pelabuhan</th>
            <th class="desc">Waktu</th>
            <th>Berat</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>';
          $no = 0;
          foreach ($tangkapan as $b) {
          $idtangkapan = $b->idtangkapan;
          $total = $this->db->query("SELECT SUM(item_tangkap.harga) as totaltangkapan FROM item_tangkap where item_tangkap.idtangkapan = '$idtangkapan'")->row()->totaltangkapan;
          $berat = $this->db->query("SELECT SUM(item_tangkap.qty) as totalberat FROM item_tangkap where item_tangkap.idtangkapan = '$idtangkapan'")->row()->totalberat;
          $nmkapal = $b->nmkapal;
          $nmpelabuhan = $b->nmpelabuhan;
          $waktu = tgl_indo(date("Y-m-d", strtotime($b->waktu)));
          $total_idr = number_format($total,0,",",".");
          if($range != 'cetak_laporan') $grand = $this->db->query("SELECT SUM(item_tangkap.harga) as total_harga FROM item_tangkap, tangkapan where item_tangkap.idtangkapan = tangkapan.idtangkapan and DATE(tangkapan.waktu) >= '$tglawal_' and DATE(tangkapan.waktu) <= '$tglakhir_'")->row()->total_harga;
          if($range == 'cetak_laporan') $grand = $this->db->query("SELECT SUM(item_tangkap.harga) as total_harga FROM item_tangkap")->row()->total_harga;
          $grand_ = number_format($grand,0,",",".");
          $no++;
          $strhtml .='<tr>
            <td class="service">'.$no.'</td>
            <td class="desc">'.$b->nmkapal.'</td>
            <td class="desc">'.$b->nmpelabuhan.'</td>
            <td class="desc">'.$waktu.'</td>
            <td class="total">'.$berat.'</td>
            <td class="total">Rp. '.$total_idr.'</td>
          </tr>';
          }
        
          $strhtml .='
          <tr>
            <td colspan="5" class="grand total">Total Penghasilan</td>
            <td class="grand total">Rp. '.$grand_.'</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
      Laporan ini dicetak pada '.$today.'
    </footer>
  </body>
</html>
';


require ("mpdf/mpdf.php");

$fileName = 'Invoice';
$mpdf = new mPDF('utf-8', 'A4');
$stylesheet = file_get_contents('assets/css/invoice.css'); // external css
$mpdf->showWatermarkImage = true;
$mpdf->AddPage('P','','','','',10, 10, 20, 20, 30, 10);
$mpdf->SetTitle('Invoice');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($strhtml);
$mpdf->Output($fileName. '.pdf','I');