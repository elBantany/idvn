		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
		        			<h3 style='font-size:18px;'>Indeks Kerentanan</h3><hr>
							<?php 
		        			if(!count($daftar_vulner)){
								echo "Data Tidak Ditemukan";
							} else {
								$a=0;
							foreach ($daftar_vulner as $vulner){
							
							$a++;
							?>
							<p class="kont">
								> <a href="<?php echo site_url('ancaman/level/'.$vulner->judulRisk); ?>">
									<?php echo $vulner->judulRisk; ?>
								</a> <?php } ?>
						<p style='font-size:12px;text-align:left;'>Menampilkan <strong><?php echo $a?></strong> data dari <strong>x</strong> total, <a href="<?php echo site_url('laporan'); ?>">Tampilkan lebih banyak</a></p>
					
							<?php
							}
					?>
					<hr>
					<p style='font-size:10px;text-align:right;margin: -15px 0px -30px 0px;'>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Last Updated <strong>' . '20:00:00, 20 Januari 2016' . '</strong>' : '' ?></p>
		        		</div>
	        		</div>
	        		<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="<?php echo asset_url_img(); ?>service-icon/diamond.png" alt="Service 1">
		        			<h3>RIGHT MENU</h3>
		        			<p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>
		        			<a href="#" class="btn">Read more</a>
		        		</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <!-- End Services -->
