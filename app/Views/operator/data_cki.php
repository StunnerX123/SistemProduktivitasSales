<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<div class="container">
	<div class="row">
		<div class="col">
			<table class="table class text-center">
				<thead>
    			<tr>
      				<th >No</th>
      				<th >Kode</th>
      				<th >STO</th>
      				<th >Group Channel</th>
      				<th >Tanggal</th>
    			</tr>
  				</thead>
  				<tbody>
    			<tr>
      				<th scope="row" colspan="5">Total Keseluruhan</th>
      				<td>0</td>
      				<td>0</td>
      				<td>0</td>
    			</tr>
  				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection();?>