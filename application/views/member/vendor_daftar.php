		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
		        			<h3 style='font-size:18px;'>Pendaftaran Vendor</h3>
							<h5><a href="<?php echo site_url('beranda'); ?>">IDVN</a> > <a href="<?php echo site_url('member'); ?>">Membership</a> > <a href="<?php echo site_url('member/vendor/list'); ?>">Vendor</a> > <a href="<?php echo site_url('member/vendor/daftar'); ?>">Daftar</a></h5><hr>
							
							<form>
								<table>
									<tr>
										<td>Nama Vendor </td>
										<td>&nbsp;</td>
										<td><input type="text" size="50" placeholder=" Nama Vendor" ></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Jenis Perangkat </td>
										<td>&nbsp;</td>
										<td>
											<select name="">
												<option value="pilih"> -- Pilih -- </option>
												<option value="hard">Penyedia Perangkat Keras</option>
												<option value="soft">Penyedia Perangkat Lunak</option>
											</select>
										</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Pendaftar </td>
										<td>&nbsp;</td>
										<td><input type="text" size="25" placeholder=" Nama Pendaftar" ></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Email </td>
										<td>&nbsp;</td>
										<td><input type="email" size="40" placeholder=" Nama Vendor" ></td>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Kontak </td>
										<td>&nbsp;</td>
										<td><input type="text" size="20" placeholder=" Nomor Telpon/HP" ></td>
									<tr><td>&nbsp;</td></tr>
									</tr>
										<td>&nbsp; </td>
										<td>&nbsp;</td>
										<td><p style="font-size:11px;"><input type="checkbox" name="setuju"> Dengan ini saya menyetujui <a target="_blank" href="<?php echo site_url('member/eula'); ?>"><strong>Kesepakatan Bersama</strong></a>.</p></td>
									</tr>
									</tr>
										<td>&nbsp; </td>
										<td>&nbsp;</td>
										<td><button>Daftar</button><input type="reset"></td>
									</tr>
								</table>
							</form>
							
					<hr>
					<p style='font-size:10px;text-align:right;margin: -15px 0px -30px 0px;'>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Last Updated <strong>' . '20:00:00, 20 Januari 2016' . '</strong>' : '' ?></p>
		        		</div>
	        		</div>
	        		
	    <!-- End Services -->
