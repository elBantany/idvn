		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-8 col-sm-6">
	        			<div class="service-wrapper">
		        			<h3 style='font-size:18px;'>Pendaftaran Kontributor</h3>
							<h5><a href="<?php echo site_url('beranda'); ?>">IDVN</a> > <a href="<?php echo site_url('member'); ?>">Membership</a> > <a href="<?php echo site_url('member/kontributor/list'); ?>">Kontributor</a> > <a href="<?php echo site_url('member/kontributor/daftar'); ?>">Daftar</a></h5><hr>
							
							<form action="<?php echo site_url('member/addproc/2'); ?>" method="POST">
								<table>
									<tr>
										<td>Nama Kontributor </td>
										<td>&nbsp;</td>
										<td><input name="nama"  type="text" size="50" placeholder=" Nama Kontributor"  required></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Alias </td>
										<td>&nbsp;</td>
										<td><input name="alias" type="text" size="25" placeholder=" Nama Alias"  required></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Username </td>
										<td>&nbsp;</td>
										<td><input name="uname" type="text" size="25" placeholder=" Username"  required></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Password </td>
										<td>&nbsp;</td>
										<td><input name="pwd" type="password" size="25" placeholder=" Password"  required></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Email </td>
										<td>&nbsp;</td>
										<td><input name="email"  type="email" size="40" placeholder=" Nama Kontributor"  required></td>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Kontak </td>
										<td>&nbsp;</td>
										<td><input name="hp"  type="text" size="20" placeholder=" Nomor Telpon/HP"  required></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td valign="top">Alamat </td>
										<td>&nbsp;</td>
										<td><textarea name="alamat" cols="55" rows="4" required></textarea></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>&nbsp; </td>
										<td>&nbsp;</td>
										<td><p style="font-size:11px;"><input type="checkbox" name="setuju" required> Dengan ini saya menyetujui <a target="_blank" href="<?php echo site_url('member/eula'); ?>"><strong>Kesepakatan Bersama</strong></a>.</p></td>
									</tr>
									<tr>
										<td>&nbsp; </td>
										<td>&nbsp;</td>
										<td>
										<div class="g-recaptcha" id="rcaptcha" style="margin-left: 90px;" data-sitekey="6LfYThwTAAAAAInJpBODpeNw80-bn-eyihp_rPBU"></div>
										<span id="captcha" style="margin-left:100px;color:red" /></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
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
	        		
	    <script type="text/javascript">
		  function get_action(form) {
		    var v = grecaptcha.getResponse();
		    if(v.length == 0)
		    {
		        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
		        return false;
		    }
		    if(v.length != 0)
		    {
		        document.getElementById('captcha').innerHTML="Captcha completed";
		        return true; 
		    }
		}
	    </script>
	    <!-- End Services -->
