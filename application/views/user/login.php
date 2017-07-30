<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login Example - Semantic</title>
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/reset.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/site.css">

  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/container.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/grid.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/header.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/image.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/menu.css">

  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/divider.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/segment.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/form.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/input.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/button.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/list.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/message.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url_semantic(); ?>components/icon.css">

  <script src="<?php echo asset_url_semantic(); ?>jquery.min.js"></script>
  <script src="<?php echo asset_url_semantic(); ?>components/form.js"></script>
  <script src="<?php echo asset_url_semantic(); ?>components/transition.js"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="<?php echo asset_url_semantic(); ?>../examples/assets/images/logo.pngs" class="image">
      <div class="content">
        Masuk sebagai pengguna IDVN 
      </div>
    </h2>
    <form class="ui large form" method="post" action="<?php echo site_url('login/cek') ?>">
      <div class="ui stacked segment"> 
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <input class="ui fluid large teal submit button" type="submit"></input>
      </div>
      <?php
        if ($msg) {
          ?>
       <div class="ui error message" style="display:block">
        <?php echo $msg; ?>
       </div>
          <?php
        }else{
          ?>
       <div class="ui error message">

       </div>
          <?php
        }
      ?>
     
    </form>

    <div class="ui message">
      <a href="#">Lupa password</a>
    </div>
  </div>
</div>
<script type="text/javascript">
  function login(){
    var uname = document.getElementById('username').value;
    var pwd = document.getElementById('password').value;
    window.location = "<?php echo site_url('admin/laporan/index/1') ?>"+"/"+kata;
    return false;
  }
</script>
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Mohon masukan password anda'
                },
                {
                  type   : 'length[4]',
                  prompt : 'Mohon masukan password anda dengan benar'
                }
              ]
            },
            username: {
              identifier  : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Mohon masukan username anda'
                },
                {
                  type   : 'length[4]',
                  prompt : 'Mohon masukan username anda dengan benar'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</body>

</html>
