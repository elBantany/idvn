		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
		        			<h3 style='font-size:20px;'>Laporan <?php echo $nama  ?></h3><hr>
							<?php 
		        			if(!count($daftar_vulner)){
								echo "Data Tidak Ditemukan";
							} else {
								?>
							
								<?php
								$a=0;
							?>
							<table class="bordered">
									<thead>
										<tr>
											<th>Code</th>
											<th>Kerentanan</th>
											<th>Kontributor</th>
											<th>Tanggal</th>
										</tr>
									</thead>
							<?php	
							foreach ($daftar_vulner as $vulner){
									
									$a++;
									?>
										<tbody>
											<tr>
												<td>
													IDV#<?php echo $vulner->codeVulner; ?> 
												</td>
												<td>
													<a href="<?php echo site_url('laporan/detail/'.$vulner->codeVulner); ?>">
														<?php  echo $vulner->namaVulner; ?>
													</a>
												</td>
												<td>
													<a href="#">
														<?php  echo $vulner->kont; ?>
													</a>
												</td>
												<td>
													<?php 
															$o = substr($vulner->tglUp,0,4);
															$b = substr($vulner->tglUp,5,2);
															$c = substr($vulner->tglUp,8,2);
														?>
													<!-- <a href="<?php echo site_url('indeks/tanggal/'.$o."-".$b."-".$c); ?>"> -->
													<a href="<?php echo site_url('indeks/tanggal/'.$vulner->tglUp); ?>">
														<?php echo $vulner->tglUp; ?>, <?php echo $vulner->wktUp; ?>
													</a>
												</td>
											</tr>
										</tbody>
									<?php
									
								}
								?>
								</table>
								<p style='font-size:12px;text-align:left;'>Menampilkan <strong><?php echo $a?></strong> data dari <strong>x</strong> total, <a href="<?php echo site_url('laporan'); ?>">Tampilkan lebih banyak</a></p>
								
							<?php


							}
					?>
					<hr>
					<p style='font-size:10px;text-align:right;margin: -15px 0px -30px 0px;'>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Last Updated <strong>' . '20:00:00, 20 Januari 2016' . '</strong>' : '' ?></p>
		        		</div>
	        		</div>
	        		