<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="container">
	<div class="row">
		<div class="col">
			<h3 class="text-center">Daftar Bulanan Sales</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<form action="" method="get">
			<div class="input-group mb-3">
 				<input type="text" class="form-control" placeholder="Masukkan pencarian.." name="keyword">
 				<div class="input-group-append">
   				<button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table class="table class table-bordered">
				<thead>
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2" class="col-5">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th colspan="2">Group Channel</th>
      				<th rowspan="2">Total</th>
    			</tr>
    			<tr>
    				<th>ND</th>
    				<th>D</th>
    			</tr>
  				</thead>
  				<tbody>
  				<?php
  				$n=1+(10 * ($currentPage - 1));
  					foreach ($data_sales as $k) : ?>
  					<tr>
	  					<td><?= $n++ ?></td>
	  					<td><?= strtoupper($k['nama_sales']) ?></td>
	  					<td><?= $k['kode'] ?></td>
	  					<td><?= $k['agency'] ?></td>
	  					<td>0</td>
	  					<td>0</td>
	  					<td>0</td>
	  				</tr>
  					<?php endforeach; ?>
    			<tr>
      				<th scope="row" colspan="4">Total Keseluruhan</th>
      			</tr>
  				</tbody>
			</table>
			<?= $pager->links('tb_datasales', 'table_pagination'); ?>
		</div>
	</div>
</div>

<?= $this->endSection();?>