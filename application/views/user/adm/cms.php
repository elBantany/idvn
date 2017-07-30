<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>IDVN - Indonesia Vulnerability Notes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>semantic.css">
        <script type="text/javascript" src="<?php echo asset_url_semantic(); ?>semantic.js"></script>
        <script type="text/javascript">
          $('.ui.sidebar')
            .sidebar('toggle')
          ;
        </script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    </head>
<body>

  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="#" class="header item">
        <img class="logo" src="assets/images/logo.png">
        Indonesia Vulnerability Notes
      </a>
      <a href="#" class="item">Home</a>
      <a href="#" class="item">Dashboard</a>
      <div class="ui simple dropdown item">
        Dropdown <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="#">Link Item</a>
          <a class="item" href="#">Link Item</a>
          <div class="divider"></div>
          <div class="header">Header Item</div>
          <div class="item">
            <i class="dropdown icon"></i>
            Sub Menu
            <div class="menu">
              <a class="item" href="#">Link Item</a>
              <a class="item" href="#">Link Item</a>
            </div>
          </div>
          <a class="item" href="#">Link Item</a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
<!-- Menu kanan -->
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <a class="item active" href="<?php echo site_url('admin'); ?>">
        Notifikasi
      </a>
      <a class="item" href="<?php echo site_url('admin/laporan'); ?>">
        Laporan
      </a>
      <a class="item" href="<?php echo site_url('admin'); ?>">
        Konten
      </a>
      <a class="item" href="<?php echo site_url('admin/akun'); ?>">
        Akun
      </a>
      <a class="item" href="#">
        e-Mail
      </a>
      <h5 class="right">CMS elBantany v.0.0.1</h5> 
    </div>
  </div>
  <div class="twelve wide stretched column">
  <!-- Breadcrumb -->
    <div class="ui segment">
      <div class="ui small breadcrumb">
        <a class="section">IDVN</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Notifikasi</div><hr>
          <!-- PENCARIAN -->
        <br><br>
        <div class="ui item">
          <div class="ui action left icon input">
              <i class="search icon"></i>
              <input type="text" placeholder="Cari...">
              <div class="ui button">Cari</div>
            </div>
        </div>
          <!-- TABEL -->
          <table class="ui celled table">
            <thead>
              <tr>
                <th>Waktu</th>
                <th>Notifikasi</th>
                <th>Status</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>06-03-2016, 08:00:00</td>
                <td><a href="#">e-Mail dari muhammad_ali@gmail.com</a></td>
                <td>Belum dilihat</td>
                <td> - </td>
              </tr>
              <tr class="warning">
                <td>05-03-2016, 11:00:00</td>
                <td><a href="#">Adi mengirimkan laporan (IDVN#1602002)</a></td>
                <td><i class="attention icon"></i> Belum diperiksa</td>
                <td>Adi : "Mohon periksa secepanya, mungkin..."</td>
              </tr>
              <tr>
                <td>04-03-2016, 09:00:00</td>
                <td><a href="#">Rahmat Rudiath (PT.Cikaso) mengirimkan permohonan membership</a></td>
                <td>Belum diperiksa</td>
                <td class="warning"><i class="attention icon"></i> Penting!!</td>
              </tr>
              <tr class="disabled">
                <td>04-03-2016, 08:00:00</td>
                <td><a href="#">Rudi mengirimkan laporan (IDVN#1602001)</a></td>
                <td>Sudah diperiksa</td>
                <td>Rudi : "Ada sedikit kesalahan mohon..."</td>
              </tr>
              <tfoot>
                <tr><th colspan="4">
                  <div class="ui right floated pagination menu">
                    <a class="icon item">
                      <i class="left chevron icon"></i>
                    </a>
                    <a class="item">1</a>
                    <a class="item">2</a>
                    <a class="item">3</a>
                    <a class="item">4</a>
                    <a class="icon item">
                      <i class="right chevron icon"></i>
                    </a>
                  </div>
                </th>
              </tr></tfoot>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
</body>

</html>
