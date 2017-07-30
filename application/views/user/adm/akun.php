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
      <a class="item" href="<?php echo site_url('admin/laporan'); ?>">
        Laporan
      </a>
      <a class="item" href="<?php echo site_url('admin'); ?>">
        Konten
      </a>
      <a class="item active" href="#">
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
        <div class="active section">Akun</div><hr>
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
          <form action="akun/acc" method="POST">
          <h3>Request Akun</h3>
          <table class="ui compact celled definition table">
            <thead class="full-width">
              <tr>
                <th></th> 
                <th>Tanggal</th>
                <th>Alias/Perusahaan</th>
                <th>Username</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Jenis</th>
              </tr>
            </thead>
            <tbody>
            
            <?php 
                  if(!count($daftar_user_un)){
                echo "Data Tidak Ditemukan";
              } else {
                ?>
              
                <?php
                $a=-1;
              foreach ($daftar_user_un as $user){
              if ($user->status!="ok") {
               
              
              $a++;
            ?>
              <tr>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                  <?php 
                if ($user->status!="ok") {
                 ?>
                  <input type="hidden" name="id[<?php echo $a ?>]" value="<?php echo $user->id ?>">  
                  <input type="checkbox" name="cek[<?php echo $a ?>]" value="ok"> <label></label>
                 <?php
                }else{
                  ?>
                  <input type="checkbox" name="cek[]" value="no" checked> <label></label>
                 <?php
                }
                ?>
                    
                  </div>
                </td>
                <td>, </td>
                <td><a href="<?php echo site_url('admin/akun/'.$user->id) ?>"><?php echo $user->nama ?></a></td>
                <td><?php echo $user->uname ?></td>
                <td><a href="#"><?php echo $user->email ?></a></td>
                <td>
                <?php echo $user->kontak ?>
                </td>
                <td>
                <?php 
                $ca = substr($user->id, 0,1);
                if ($ca=="2") {
                  echo "Kontributor";
                } else if ($ca=="3") {
                  echo "Vendor";
                }{

                }
                ?>
                </td>
              </tr>
              <?php } } } ?>
              
            </tbody>
            <tfoot class="full-width">
              <tr>
                <th></th>
                <th colspan="6">
                <a href="<?php echo site_url('admin/laporan/tambah') ?>">
                  <div class="ui right floated small primary labeled icon button">
                    <i class="archive icon"></i> Tambah User
                  </div>
                </a>
                    <input type="submit" class="ui small  button" value="Approve"> 

                </th>
              </tr>
              <tr>
                <th colspan="7">
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
          </form>

          <!-- TABEL -->
          <h3>Daftar Kontributor</h3>
          <table class="ui compact celled definition table">
            <thead class="full-width">
              <tr>
                <th></th> 
                <th>Tanggal</th>
                <th>Alias</th>
                <th>Username</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Jenis</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                  if(!count($daftar_user_kont)){
                echo "Data Tidak Ditemukan";
              } else {
                ?>
              
                <?php
                $a=0;
              foreach ($daftar_user_kont as $user){
              if ($user->status=="ok") {
               
              
              $a++;
            ?>
              <tr>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                  <?php 
                if ($user->status!="ok") {
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
                <td>, </td>
                <td><a href="<?php echo site_url('admin/akun/'.$user->id) ?>"><?php echo $user->nama ?></a></td>
                <td><?php echo $user->uname ?></td>
                <td><a href="#"><?php echo $user->email ?></a></td>
                <td>
                <?php echo $user->kontak ?>
                </td>
                <td>
                <?php 
                $ca = substr($user->id, 0,1);
                if ($ca=="2") {
                  echo "Kontributor";
                } else if ($ca=="3") {
                  echo "Vendor";
                }{

                }
                ?>
                </td>
              </tr>
              <?php } } } ?>
            </tbody>
            <tfoot class="full-width">
              <tr>
                <th colspan="7">
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


          <!-- TABEL -->
          <h3>Daftar Vendor</h3>
          <table class="ui compact celled definition table">
            <thead class="full-width">
              <tr>
                <th></th> 
                <th>Tanggal</th>
                <th>Perusahaan</th>
                <th>Username</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Jenis</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                  if(!count($daftar_user_un)){
                echo "Data Tidak Ditemukan";
              } else {
                ?>
              
                <?php
                $a=0;
              foreach ($daftar_user_un as $user){
              if ($user->status!="ok") {
               
              
              $a++;
            ?>
              <tr>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                  <?php 
                if ($user->status!="ok") {
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
                <td>, </td>
                <td><a href="<?php echo site_url('admin/akun/'.$user->id) ?>"><?php echo $user->nama ?></a></td>
                <td><?php echo $user->uname ?></td>
                <td><a href="#"><?php echo $user->email ?></a></td>
                <td>
                <?php echo $user->kontak ?>
                </td>
                <td>
                <?php 
                $ca = substr($user->id, 0,1);
                if ($ca=="2") {
                  echo "Kontributor";
                } else if ($ca=="3") {
                  echo "Vendor";
                }{

                }
                ?>
                </td>
              </tr>
              <?php } } } ?>
            </tbody>
            <tfoot class="full-width">
              <tr>
                <th colspan="7">
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
