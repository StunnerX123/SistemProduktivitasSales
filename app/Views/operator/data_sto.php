<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="container col-11">
	<div class="row">
		<div class="col">
			<h3 class="text-center p-2">Data STO</h3>
		</div>
	</div>
	<div id="accordion">
  	<div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Advanced Search
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="row">
          <div class="col-7">
            <form action="" method="get">
            <?= csrf_field(); ?>
              <table class="col-12">
                <tr>
                  <th class="text-center"><label>Dari tanggal</label></th>
                  <th class="text-center"><label>Sampai dengan</label></th>
                  <th class="text-center"><label>Agency</label></th>
                </tr>
                <tr>
                  <td><input type="date" name="tanggalmin" class="form-control" value="<?= $tanggal['tanggal_min'] ?>" required></td>
                  <td><input type="date" name="tanggalmax" class="form-control" value="<?= $tanggal['tanggal_max'] ?>" required></td>
                  <td>
                  	<select class="form-control" name="agency">
                      <option>--Pilihan Anda--</option>
                      <?php
                  			foreach ($allAgency as $k) : ?>
                  		  <option><?= $k['agency'] ?></option>
                  		<?php endforeach; ?>
                  	</select>
                  </td>
                  <td>
                    <div class="input-group">
                      <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </div>
            <div class="col-5">
              <form action="" method="get">
                <?= csrf_field(); ?>
                <table class="col-12">
                  <tr>
                    <th class="text-center"><label><br></label></th>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="input-group">
                        <input class="form-control" type="text" name="keyword">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          <!-- <div class="col">.col</div> -->
        </div>
      </div>
    </div>
  	</div>
  	</div>
	<div class="row">
		<div class="col">
			<table class="table class table-bordered">
				<thead class="text-center">
    			<tr>
      				<th rowspan="2">No</th>
      				<th rowspan="2">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2">Agency</th>
      				<th colspan="5">STO</th>
      				<th rowspan="2" class="bg-warning">Total</th>
      			</tr>
    			<tr>
      				<th>CKI</th>
    				<th>RGA</th>
    				<th>JTW</th>
    				<th>MJL</th>
    				<th>KAD</th>
    			</tr>
  				</thead>
  				<tbody>
  				<?php
  					$n=1+(10 * ($currentPage - 1));
  					foreach($allSales as $k) : ?>
  				<tr>
  					<td class="text-center" ><?= $n++ ?></td>
  					<td><?= strtoupper($k['nama_sales']); ?></td>
  					<td class="text-center col-1" ><?= $k['kode']; ?></td>
  					<td class="text-center col-3" ><?= $k['agency']; ?></td>
  					<td class="text-center" ><?= $k['cki']; ?></td>
  					<td class="text-center" ><?= $k['rga']; ?></td>
  					<td class="text-center" ><?= $k['jtw']; ?></td>
  					<td class="text-center" ><?= $k['mjl']; ?></td>
  					<td class="text-center" ><?= $k['kad']; ?></td>
  					<td class="text-center bg-warning" ><?= $k['total']; ?></td>
  				</tr>
  				<?php endforeach; ?>
    			<tr>
      				<th scope="row" colspan="3">Total Keseluruhan</th>
    			</tr>
  				</tbody>
			</table>
			<?= $pager->links('joinstoSalesLeft', 'table_pagination'); ?>
		</div>
	</div>
</div>

<?= $this->endSection();?>