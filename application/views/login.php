<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>KKP</title>

    <!-- vendor css -->
    <link href="<?php echo base_url() ?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signin">

        <table>
          <tr>
            <td><img src="<?php echo base_url() ?>assets/img/lampung.png" style="width: 40px; float: left;"></td>
            <td><img src="<?php echo base_url() ?>assets/img/logo.png" style="width: 60px; float: right;"></td>
          </tr>
        </table>
        
        <center>
        <h1 class="az-logo" style="text-transform: uppercase;">DKP Provinsi Lampung</h1>
        </center>
        
        <div class="az-signin-header">
          <h2>Selamat datang!</h2>
          <h6>Silakan login untuk melanjutkan</h6>
          <?php if ($this->session->flashdata('error')){echo 'Login gagal, periksa kembali Username dan Password anda'; } ?>
          <?php if ($this->session->flashdata('error_status')){echo 'Login gagal, periksa kembali Username dan Password anda'; } ?>
          <form action="<?php echo base_url();?>auth/signInUser" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" value="sumanto" required>
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" value="admin" required>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-az-primary btn-block">Masuk</button>
          </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
          <!-- <p><a href="">Forgot password?</a></p> -->
          <!-- <p>Belum punya akun? <a href="user/register">Buat Akun</a></p> -->
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="<?php echo base_url() ?>assets/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/ionicons/ionicons.js"></script>

    <script src="<?php echo base_url() ?>assets/js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>