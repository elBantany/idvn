		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
		        			<h3 style='font-size:18px;'>List Kontributor</h3>
							<h5><a href="<?php echo site_url('beranda'); ?>">IDVN</a> > <a href="<?php echo site_url('member'); ?>">Membership</a> > <a href="<?php echo site_url('member/kontributor/list'); ?>">Kontributor</a></h5><hr>
							<a href="<?php echo site_url('member/kontributor/daftar'); ?>" class="btn btn-blue">Daftar Kontributor</a><br><br>
							<input type="text" placeholder="pencarian Kontributor"><input type="submit" class="social-login social-login-buttons" value="cari">
							<br><br>
							<div align='center'>
								<table border='1'>
									<th>
										 &nbsp;&nbsp; Nama Kontributor &nbsp;&nbsp;
									</th>
									<th>
										 &nbsp;&nbsp; Status Kontributor &nbsp;&nbsp;
									</th>
									<th>
										 &nbsp;&nbsp; Total Laporan &nbsp;&nbsp;
									</th>
									<tr>
										<td>
										 Nama Kontributor 
										</td>
										<td>
										 Status Kontributor 
										</td>
										<td>
										 Total Laporan 
										</td>
									</tr>
								</table>
							</div>
							
					<hr>
					<p style='font-size:10px;text-align:right;margin: -15px 0px -30px 0px;'>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Last Updated <strong>' . '20:00:00, 20 Januari 2016' . '</strong>' : '' ?></p>
		        		</div>
	        		</div>
	        		
	    <!-- End Services -->
