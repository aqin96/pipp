<?php
$strhtml = '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Data - CV Bumi Karya Consultant</title>
</head>

<body>
    <div class="invoice-box"><h3 style="text-align:center">Data Master CV Bumi Karya Consultant</h3><br><br>
        <table border="1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Objek</th>
                      <th>Keterangan</th>
                      <th>Tampak Depan</th>
                      <th>QR Code</th>
                    </tr>
                  </thead>
                  <tbody>';
                    $no = 0;
                    foreach ($objek as $b){
                    $no++;
                    $strhtml .= '
                    <tr>
                      <td><center>'.$no.'</center></td>
                      <td><center>'.$b->nmobjek.'</center></td>
                      <td><center>'.$b->keterangan.'</center></td>
                      <td><center><img src="'.base_url().'assets/img/front/'.$b->tampakdepan.'" style="height: 100px"></center></td>
                      <td><center><img src="'.base_url().'assets/img/qr/'.$b->kodeobjek.'.png" style="height: 100px"></center></td>
                    </tr>';
                    }
                  $strhtml .= '</tbody>
                </table><br>';
        
    $strhtml .= '</div>
</body>
</html>
';

require ("mpdf/mpdf.php");

$fileName = 'Cetak Data - CV Bumi Karya Consultant';
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->showWatermarkImage = true;
$mpdf->AddPage('P','','','','',10, 10, 20, 20, 30, 10);
$mpdf->SetTitle('Cetak Data - CV Bumi Karya Consultant');
$mpdf->WriteHTML($strhtml);
$mpdf->Output($fileName. '.pdf','I');