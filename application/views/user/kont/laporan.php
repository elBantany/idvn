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
      <a href="<?php echo site_url('beranda'); ?>" class="item">Home</a>
      <a href="<?php echo site_url('kontributor/profile'); ?>" class="item">Profile</a>
      <a href="<?php echo site_url('kontributor/logout'); ?>" class="item">Logout</a>
      
    </div>
  </div>
  <br><br><br><br>
<!-- Menu kanan -->
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <a class="item" href="<?php echo site_url('kontributor'); ?>">
        Notifikasi
      </a>
      <a class="item" href="<?php echo site_url('kontributor/profile'); ?>">
        Profile
      </a>
      <a class="item active" href="<?php echo site_url('kontributor/laporan'); ?>">
        Laporan
      </a>
      <a class="item" href="#">
        e-Mail
      </a>
      <h5 class="right">IDVN CMS v.0.0.1</h5> 
    </div>
  </div>
  <div class="twelve wide stretched column">
  <!-- Breadcrumb -->
    <div class="ui segment">
      <div class="ui small breadcrumb">
        <a class="section">IDVN</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Laporan</div><hr>
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
          <table class="ui compact celled definition table">
            <thead class="full-width">
              <tr>
                <th></th> 
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Kode IDVN</th>
                <th>Pelapor</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                  if(!count($daftar_vulner)){
                echo "Data Tidak Ditemukan";
              } else {
                ?>
              
                <?php
                $a=0;
              foreach ($daftar_vulner as $vulner){
              
              $a++;
            ?>
              <tr>
                <td class="">
                  
                </td>
                <td><?php echo $vulner->date; ?>, <?php echo $vulner->time; ?></td>
                <td>

                <?php
                  if ($vulner->tampil!="ok") {
                 ?>
                  <a href="<?php echo site_url('kontributor/laporan/'.$vulner->code) ?>"><?php echo $vulner->judul ?></a>
                 <?php
                }else{
                  ?>
                    <?php echo $vulner->judul ?>
                  <?php
                }
                ?>
                </td>
                <td>IDVN#<?php echo $vulner->code ?></td>
                <td>
                <?php echo $vulner->kont ?></td>
                <td>  
                <?php 
                if ($vulner->tampil=="ok") {
                 ?>
                  <i class="icon checkmark"></i> Ditampilkan
                 <?php
                }else if ($vulner->tampil=="no") {
                  ?>
                  <i class="icon close"></i> Ditolak
                 <?php
                }else{
                  ?>
                  <i class="attention icon"></i> Belum Diperiksa
                 <?php
                }
                ?>
                </td>
              </tr>
              <?php } } ?>
            </tbody>
            <tfoot class="full-width">
              <tr>
                <th></th>
                <th colspan="5">
                <a href="<?php echo site_url('kontributor/laporan/tambah') ?>">
                  <div class="ui right floated small primary labeled icon button">
                    <i class="archive icon"></i> Tambah Laporan
                  </div>
                </a>

                </th>
              </tr>
              <tr>
                <th colspan="6">
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
              </tr>
            </tfoot>
          </table>
      </div>
    </div>
  </div>
</div>
</body>

</html>
