<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="container col-11">
	<div class="row">
		<div class="col">
			<h3 class="text-center p-2">Data Resume Agency</h3>
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
                </tr>
                <tr>
                  <td><input type="date" name="tanggalmin" class="form-control" required></td>
                  <td><input type="date" name="tanggalmax" class="form-control" required>
                  </td>
                  <td>
                  	<select class="form-control" name="agency">
                  		<?php
                  			foreach ($join_sales as $k) : ?>
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
      				<th rowspan="2" class="col-3">Nama</th>
      				<th rowspan="2">Kode</th>
      				<th rowspan="2" class="col-3">Agency</th>
      				<th colspan="2">Group Channel</th>
      				<th rowspan="2" class="bg-warning">Total</th>
      				<th rowspan="2" class="bg-primary">Rank</th>
    			</tr>
    			<tr>
    				<th>ND</th>
    				<th>D</th>
    			</tr>
  				</thead>
  				<tbody>
  				<?php
  				$n=1+(10 * ($currentPage - 1));
  					foreach ($join_sales as $k) : ?>
  					<tr>
	  					<td class="text-center"><?= $n++ ?></td>
	  					<td><?= strtoupper($k['nama_sales']) ?></td>
	  					<td class="text-center"><?= $k['kode'] ?></td>
	  					<td class="text-center"><?= $k['agency'] ?></td>
	  					<td class="text-center">
	  					<?php
	  						if($k['id_user'] == $k['Sid'] && $k['group_channel'] =='Non Digital'){
	  							echo 1;
	  						}else{
	  							echo 0;
	  						}
  						?>
	  					</td>
	  					<td class="text-center">
	  						<?php
	  						if($k['id_user'] == $k['Sid'] && $k['group_channel'] =='Digital'){
	  							echo 1;
	  						}else{
	  							echo 0;
	  						}
  						?>
	  					</td>
	  					<td class="text-center bg-warning">0</td>
	  					<td class="text-center bg-primary">0</td>
	  				</tr>
  					<?php endforeach; ?>
    			<tr>
      				<th scope="row" colspan="4">Total Keseluruhan</th>
      				<td class="text-center">0</td>
      				<td class="text-center">0</td>
      				<td class="text-center">0</td>
      			</tr>
  				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection();?>