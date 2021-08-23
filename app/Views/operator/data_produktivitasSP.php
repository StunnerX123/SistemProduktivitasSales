<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="container">
	<div class="row">
		<div class="col">
			<h3 class="text-center">Daftar Produktivitas Sales</h3>
			<div class="accordion" id="accordionExample">
			<div class="card">
	    		<div class="card-header" id="headingTwo">
    				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">KOPEGTEL JATARA</button>
    			</div>
    		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      			<div class="card-body">
					<table class="table class text-center table-bordered table-responsive">
					<thead>
    					<tr>
      						<th rowspan="2">No</th>
      						<th rowspan="2">Nama</th>
      						<th rowspan="2">Kode</th>
    	  					<th rowspan="2">Agency</th>
	      					<th rowspan="2">RANK</th>
	    	  				<?php
    	  						for ($i=1;$i<=31;$i++) { 
      								?>
		      						<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
	      					<?php } ?>
    		  				<th rowspan="2">TOTAL</th>
    					</tr>
  					</thead>
  					<tbody>
    					<tr>
      						<th scope="row" colspan="">Total Agency/Hari</th>
      						<?php
      							for ($i=1; $i<=35 ; $i++) { 
      								?>
	      							<td>0</td>
      						<?php } ?>
    					</tr>
	  				</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT MEGA CREATIVE PROMOSINDO</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT. AINIYAH INDOMITRA SEJAHTERA</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT. JATRA MANDIRI PERKASA</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT. RAJAWALI ANUGRAH RESOURCES</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
    		<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT INFOMEDIA NUSANTARA CBN</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT. SATRIA DIGITAL SEJAHTERA</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>PT MUTIARA AGUNG PERKASA ( PT MAP)</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
    		</table>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
				<tr>ANONIM</tr>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th rowspan="2">RANK</th>

      				<?php
      					for ($i=1;$i<=31;$i++) { 
      						?>
		      				<th rowspan="2" class="bg-primary"><?php echo "$i"; ?></th>
      					<?php } ?>
      				<th rowspan="2">TOTAL</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="">Total Agency/Hari</th>
      				<?php
      				for ($i=1; $i<=35 ; $i++) { 
      					?>
	      				<td>0</td>
      				<?php } ?>
    			</tr>
    			</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection();?>