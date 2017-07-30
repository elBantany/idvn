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
        <script type="text/javascript" src="<?php echo asset_url_semantic(); ?>/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea',
        menubar: 'file edit insert view format table tools' });
        tinymce.init({ selector:'tablearea',
        plugins: "table",
        menubar: "table",
        toolbar: "table" });
        </script>
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
        <a class="section">Laporan</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Edit Laporan</div>
      </div>
      <hr>
          <h3>Edit Laporan</h3>

          <?php 
            if(!count($vulner)){
                echo "Data Tidak Ditemukan";
              } else {
                foreach ($vulner as $vul) {
                  
                
                ?>

                <form class="ui form" method="POST" action="../laporan/editLap">
            <div class="field">
            <div class="inline fields">
              <label for="fruit">Tampil : </label>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="hidden" name="id" value="<?php echo $vul->id; ?>">
                  <input type="radio" name="tampil" tabindex="0" value="ok" <?php if($vul->tampil=="ok"){ ?> checked<?php } ?>>
                  <label>Ya</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="tampil" tabindex="0" value="no" <?php if($vul->tampil=="no"){ ?> checked<?php } ?>>
                  <label>Tidak</label>
                </div>
              </div>
            </div>
              <label>Author</label>
              <input type="text" name="namaAuthor" value="<?php echo $vul->kont; ?>" disabled>
            </div>
            <div class="field">
              <label>Nama Kerentanan</label>
              <input type="text" name="namaKerentanan" value="<?php echo $vul->namaVulner; ?>">
            </div>
            <div class="field">
              <label>Nama Produk</label>
              <input type="text" name="namaProduk" value="<?php echo $vul->produk; ?>">
            </div>
            <div class="inline fields">
              <label for="fruit">Platform : </label>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="platform" tabindex="0" value="1" <?php if($vul->plat==1){ ?> checked<?php } ?>>
                  <label>Website</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="platform" tabindex="0" value="2" <?php if($vul->plat==2){ ?> checked<?php } ?>>
                  <label>Aplikasi Web</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="platform" tabindex="0" value="3" <?php if($vul->plat==3){ ?> checked<?php } ?>>
                  <label>Aplikasi Mobile</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="platform" tabindex="0" value="4" <?php if($vul->plat ==4){ ?> checked<?php } ?>>
                  <label>Aplikasi Desktop</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="platform" tabindex="0" value="5" <?php if($vul->plat ==5){ ?> checked<?php } ?>>
                  <label>IoT</label>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Tinjauan</label>
              <textarea name="tinjauan"><?php echo $vul->tinjauan; ?></textarea>
            </div>
            <div class="field">
              <label>Keterangan</label>
              <textarea name="keterangan"><?php echo $vul->deskripsi; ?></textarea>
            </div>
            <div class="field">
              <label>Dampak</label>
              <textarea name="dampak"><?php echo $vul->akibat; ?></textarea>
            </div>
            <div class="field">
              <label>Solusi</label>
              <textarea name="solusi"><?php echo $vul->solusi; ?></textarea>
            </div>
            <div class="field">
              <label>Status Vendor</label>
              <textarea name="status"><?php echo $vul->vendor; ?></textarea>
              <tablearea name="statusTabel"></tablearea>
            </div>
            <div class="field">
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" class="hidden">
                <label>I agree to the Terms and Conditions</label>
              </div>
            </div>
            <button class="ui button" type="submit">Submit</button>
            <div class="ui error message"></div>
          </form>

                <?php
                }
              }
          ?>

          
    </div>
  </div>
</div>
</body>
<script>
  $('.ui.radio.checkbox')
  .checkbox()
;
$('.ui.form')
  .form({
    fields: {
      namaKerentanan: {
        namaKerentanan: 'namaKerentanan',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your name'
          }
        ]
      },
      skills: {
        identifier: 'skills',
        rules: [
          {
            type   : 'minCount[2]',
            prompt : 'Please select at least two skills'
          }
        ]
      },
      gender: {
        identifier: 'gender',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please select a gender'
          }
        ]
      },
      username: {
        identifier: 'username',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a username'
          }
        ]
      },
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a password'
          },
          {
            type   : 'minLength[6]',
            prompt : 'Your password must be at least {ruleValue} characters'
          }
        ]
      },
      terms: {
        identifier: 'terms',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must agree to the terms and conditions'
          }
        ]
      }
    }
  })
;


</script>
</html>
