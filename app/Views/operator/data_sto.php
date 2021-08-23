<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="p-3">
	<div class="row">
		<div class="col">
			<h3 class="text-center">Daftar STO Mingguan</h3>
			<table class="table class text-center table-bordered table-responsive">
				<thead>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      			<?php
      				for ($i=1; $i<=5 ; $i++) { 
      					?>
      					<th colspan="5">STO(<?php echo "Minggu-",$i; ?>)</th>
      					<th rowspan="2" class="bg-warning">Total</th>
      			<?php } ?>
      			</tr>
    			<tr>
    			<?php
      				for ($i=1; $i<=5 ; $i++) { 
      					?>
      					<th>CKI</th>
    					<th>RGA</th>
    					<th>JTW</th>
    					<th>MJL</th>
    					<th>KAD</th>
    			<?php } ?>	
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="3">Total Keseluruhan</th>
      			<?php
      				for ($i=1; $i<=30 ; $i++) { 
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