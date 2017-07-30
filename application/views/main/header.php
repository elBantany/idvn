<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>IDVN - Indonesia Vulnerability Notes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo asset_url_css(); ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo asset_url_css(); ?>icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
		<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
        <link rel="stylesheet" href="<?php echo asset_url_css(); ?>leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo asset_url_css(); ?>main.css">

        <script src="<?php echo asset_url_js(); ?>modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li>
								<div class="dropdown choose-country">
									<a class="#" data-toggle="dropdown" href="#"><img src="<?php echo asset_url_img(); ?>flags/id.png" alt="Great Britain"> Indonesia</a>
									<ul class="dropdown-menu" role="menu">
										<li role="menuitem"><a href="#"><img src="<?php echo asset_url_img(); ?>flags/gb.png" alt="English"> English</a></li>
										<li role="menuitem"><a href="#"><img src="<?php echo asset_url_img(); ?>flags/id.png" alt="Indonesia"> Indonesia</a></li>
									</ul>
								</div>
							</li>
							<?php if (empty($id)) {
								?>
									<li><a href="<?php echo site_url('login'); ?>">Login</a></li>
								<?php
							}else{
								if (substr($id, 0,1)=="1") {
									?>
										<li><a href="<?php echo site_url('admin'); ?>">admin</a></li>
									<?php
								}else if(substr($id, 0,1)=="2"){
									?>
										<li><a href="<?php echo site_url('kontributor'); ?>">kontributor</a></li>
									<?php
								}else if(substr($id, 0,1)=="3"){
									?>
										<li><a href="<?php echo site_url('vendor'); ?>">vendor</a></li>
									<?php
								}
								?>
									<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
								<?php
								} ?>
			        		
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.html">LOGO IDVN</a></li>
						<li class="active">
							<a href="<?php echo site_url('beranda'); ?>">Home</a>
						</li>
						<li class="has-submenu">
							<a href="#">IDVN +</a>
							<div class="mainmenu-submenu">
								<div class="mainmenu-submenu-inner"> 
									<div>
										<h4>Laporan</h4>
										<ul>
											<li><a href="<?php echo site_url('beranda'); ?>">Indeks Laporan</a></li>
										</ul>
										<!--h4>Level Kerentanan</h4>
										<ul>
											<li><a href="<?php echo site_url('ancaman'); ?>">Detail Level Kerentanan</a></li>
											<li><a href="<?php echo site_url('ancaman/level/Low'); ?>">Low</a></li>
											<li><a href="<?php echo site_url('ancaman/level/Med'); ?>">Medium</a></li>
											<li><a href="<?php echo site_url('ancaman/level/High'); ?>">High</a></li>
										</ul-->
									</div>
									<div>
										<h4>Berita dan Acara</h4>
										<ul>
											<li><a href="<?php echo site_url('blog'); ?>">Berita dan Acara</a></li>
											<li><a href="<?php echo site_url('blog/terkini'); ?>">Terkini</a></li>
											<li><a href="<?php echo site_url('blog/acara'); ?>">Acara</a></li>
											<li><a href="<?php echo site_url('blog/berita'); ?>">Berita</a></li>
										</ul>
									</div>
									<div>
										<h4>Tentang IDVN</h4>
										<ul>
											<li><a href="<?php echo site_url('tentang'); ?>">IDVN</a></li>
											<li><a href="<?php echo site_url('pengurus'); ?>">Pengurus</a></li>
											<li><a href="<?php echo site_url('vendor'); ?>">Vendor</a></li>
											<li><a href="<?php echo site_url('faqs'); ?>">FAQs</a></li>
										</ul>
										<h4>Membership</h4>
										<ul>
											<li><a href="<?php echo site_url('member/vendor'); ?>">Vendor</a></li>
											<li><a href="<?php echo site_url('member/kontributor'); ?>">Kontributor</a></li>
											<li><a href="<?php echo site_url('member/vendor'); ?>">Langganan</a></li>
											<li><a href="<?php echo site_url('member/eula'); ?>">EULA</a></li>
										</ul>
									</div>
								</div><!-- /mainmenu-submenu-inner -->
							</div><!-- /mainmenu-submenu -->
						</li>

						<li class="">
							<input class="a">BUAT SEARCH</input>
						</li>
					</ul>
				</nav>
			</div>
		</div>


		