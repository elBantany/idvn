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
      <a class="item" href="<?php echo site_url('admin'); ?>">
        Notifikasi
      </a>
      <a class="item active" href="#">
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
        <div class="active section">Laporan</div><hr>
          <!-- PENCARIAN -->
        <br><br>
          <div class="ui item">
            <div class="ui action left icon input">
                <i class="search icon"></i>
                <input id="cari" type="text" placeholder="Cari...">
                <div class="ui button" onclick="cari()">Cari</div>
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
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                  <?php 
                if ($vulner->tampil!="ok") {
                 ?>
                  <input type="checkbox"> <label></label>
                 <?php
                }else{
                  ?>
                  <input type="checkbox" checked> <label></label>
                 <?php
                }
                ?>
                    
                  </div>
                </td>
                <td><?php echo $vulner->date; ?>, <?php echo $vulner->time; ?></td>
                <td><a href="<?php echo site_url('admin/laporan/'.$vulner->code) ?>"><?php echo $vulner->judul ?></a></td>
                <td>IDVN#<?php echo $vulner->code ?></td>
                <td><a href="#"><?php echo $vulner->kont ?></a></td>
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
                <a href="<?php echo site_url('admin/laporan/tambah') ?>">
                  <div class="ui right floated small primary labeled icon button">
                    <i class="archive icon"></i> Tambah Laporan
                  </div>
                </a>
                  <div class="ui small  button">
                    Approve
                  </div>
                  <div class="ui small  disabled button">
                    Approve All
                  </div>

                </th>
              </tr>
              <tr>
                <th colspan="6">
                  <div class="ui right floated pagination menu">
                  <?php
                      if ($pg!=1) {
                       
                        $ca = $pg-1;
                       ?>
                      <a class="icon item" href="<?php echo site_url('admin/laporan/index/'.$ca.'/'.$cari) ?>">
                      <i class="left chevron icon"></i>
                    </a>
                       <?php
                      }
                   ?>
                    
                    <?php
                      $a=0;
                      $ga=1;
                      foreach ($listpg as $lspg) {
                        if ($listpg[$a]==$pg) {
                      ?>
                      <a class="item active" href="<?php echo site_url('admin/laporan/index/'.$listpg[$a].'/'.$cari) ?>"><?php echo $listpg[$a]; ?></a>
                      <?php
                     
                          }else{
                      ?>
                      <a class="item" href="<?php echo site_url('admin/laporan/index/'.$listpg[$a].'/'.$cari) ?>"><?php echo $listpg[$a]; ?></a>
                      <?php   
                          }

                         $a++;
                         $ga=$a;
                      }

                     if ($pg!=$ga) {
                      $ca = $pg+1;
                    ?>
                    <a class="icon item" href="<?php echo site_url('admin/laporan/index/'.$ca.'/'.$cari) ?>">
                      <i class="right chevron icon"></i>
                    </a>
                    <?php 
                      } 
                    ?>
                  </div>
                </th>
              </tr>
              
            </tfoot>
          </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cari(){
    var kata = document.getElementById('cari').value;
    window.location = "<?php echo site_url('admin/laporan/index/1') ?>"+"/"+kata;
    return false;
  }
</script>
</body>

</html>
