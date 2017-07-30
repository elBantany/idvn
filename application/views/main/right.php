<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">
		        			
		        			<h3>Ranking Kontributor</h3>
		        			<hr>
		        			<div class="span6">
		        			<!--
							PERSENTASE DIDAPAT DARI
							tot_lap_kont/tot_lap_all x 100
		        			-->
							  <h5>Kontributor terbaik dengan total laporan kerentanan terbanyak yang diunggah oleh kontributor IDVN</h5>
							  <?php
							  $total=0;
							  foreach ($tot_lap as $tot) {
							  	$total = $tot->total;
							  }
							  $total = substr($total, 0,2);
							  foreach ($daftar_kont as $kont){
							  	$tot = $kont->total / $total * 100;
							  	$tot = substr($tot, 0,2);
							  ?>

							  <strong><?php echo $kont->alias ?></strong><span class="pull-right"><?php echo $kont->total ?></span>
							  <div class="progress progress-danger active">
							      <div class="bar" style="width: 30%;"><?php echo $tot."%" ?></div>
							  </div>
							  <?php
							  }
							  ?>
							  <p>
							  </p>
							</div>
		        		</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <script type="text/javascript">
	    	$('.bordered tr').mouseover(function(){
			    $(this).addClass('highlight');
			}).mouseout(function(){
			    $(this).removeClass('highlight');
			});
			$(".zebra tbody tr:even").addClass('alternate');
	    </script>
	    <!-- End Services -->
