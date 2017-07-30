<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to IDVN</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	p.kont {
		border-bottom: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	p.isi {
		line-height: 32px;
		margin: -20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Catatan Kerentanan Terbaru</h1>

	<div id="body">
		
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
				<p class="kont">
					<?php echo $vulner->codeVulner; ?> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					[<a href="<?php echo site_url('ancaman/level/'.$vulner->codeRisk); ?>">
						<?php echo $vulner->codeRisk; ?>
					</a>]
					
					<a href="<?php echo site_url('laporan/detail/'.$vulner->codeVulner); ?>">
						<?php  echo $vulner->namaVulner; ?>
					</a>
					&nbsp;&nbsp;
					(
						<?php 
							$o = substr($vulner->tglUp,0,4);
							$b = substr($vulner->tglUp,5,2);
							$c = substr($vulner->tglUp,8,2);
						?>
					<a href="<?php echo site_url('indeks/tanggal/'.$o."-".$b."-".$c); ?>">
						<?php echo $vulner->tglUp; ?>, <?php echo $vulner->wktUp; ?>
					</a>)</p>
				<?php } ?>
			
				<?php
				}
		?>
		
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>