		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
	        				<?php 
		        			if(!count($isi)){
								echo "Data Tidak Ditemukan";
							} else {
								?>
							
								<?php
								$a=0;
							foreach ($isi as $vulner){
							
							$a++;
							?>

		        			<h3 style='font-size:18px;'><?php echo $vulner->namaVulner;  ?></h3>
		        			<h5>IDV#<?php echo $vulner->codeVulner; ?></h5>
		        			<hr>
							<div class="service-wrapper">
								<h4><strong>Tinjauan</strong></h4>
								<p class="kont">
									<?php echo $vulner->tinjauan; ?>
								</p>
								<hr>
								<h4><strong>Produk</strong></h4>
								<p class="kont">
									<?php echo $vulner->produk; ?>
								</p>
								<hr>
								<h4><strong>Keterangan</strong></h4>
								<p class="kont">
									<?php echo $vulner->deskripsi; ?>
								</p>
								<hr>
								<h4><strong>Dampak</strong></h4>
								<p class="kont">
									<?php echo $vulner->akibat; ?>
								</p>
								<hr>
								<h4><strong>Solusi</strong></h4>
								<p class="kont">
									<?php echo $vulner->solusi; ?>
								</p>
								<hr>
								<h4><strong> Stataus Vendor</strong></h4>
								<p class="kont">
									<?php echo $vulner->vendor; ?>
								</p>
								<hr>
								<h4><strong>Referensi</strong></h4>
								<p class="kont">
									<?php echo $vulner->referensi; ?>
								</p>
								<hr>
							</div>
							<?php } ?>
						
					
							<?php
							}
					?>
					<hr>
					<p style='font-size:10px;text-align:right;margin: -15px 0px -30px 0px;'>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Last Updated <strong>' . '20:00:00, 20 Januari 2016' . '</strong>' : '' ?></p>
		        		</div>
	        		</div>
	        	
	    <!-- End Services -->
