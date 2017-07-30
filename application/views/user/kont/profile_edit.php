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
      <a class="item active" href="<?php echo site_url('kontributor/profile'); ?>">
        Profile
      </a>
      <a class="item" href="<?php echo site_url('kontributor/laporan'); ?>">
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
        <a class="section" href="<?php echo site_url('kontributor/profile'); ?>">Prifile</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Edit</div><hr>
        <form action="" method="POST" class="ui form" >
            <div class="ui card">
              <div class="blurring dimmable image">
                <div class="ui dimmer transition hidden">
                  <div class="content">
                    <div class="center">
                      <div class="ui inverted button">Call to Action</div>
                    </div>
                  </div>
                </div>
                <img src="<?php echo asset_url_semantic(); ?>../examples/assets/images/wireframe/image.png">
              </div>
              <div class="content">
                <div class="field">
                  <input type="text" name="nama" value="<?php echo $detail[0]->n_vv_nama; ?>" placeholder="NAMA">
                </div>
                <div class="field">
                  <input type="text" name="alias" value="<?php echo $detail[0]->n_vv_alias; ?>" placeholder="ALIAS">
                </div>
                <div class="field">
                  <input type="text" name="emailUser" value="<?php echo $detail[0]->n_vv_email; ?>" placeholder="EMAIL">
                </div>
                <div class="field">
                  <input type="text" name="emailIDVN"  value="<?php echo $detail[0]->n_vv_idvnemail; ?>" placeholder="EMAIL IDVN">
                </div>
                <div class="meta">
                  <span class="date">* Setiap perubahan kecuali alias akan diproses terlebih dahulu oleh pihak administrator IDVN *</span>
                </div>
              </div>
              <div class="extra content">
              <button class="ui button" type="submit"><i class="users icon"></i>
                  Ubah Data</button>
                <a href="<?php echo site_url('kontributor/profile/edit'); ?>">
                 
                </a>
              </div>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>
