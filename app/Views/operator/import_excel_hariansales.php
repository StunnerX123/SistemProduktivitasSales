<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<!-- Import Excel Section Start -->
<section class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">Import Harian Sales Post</h2>
    </div>
  </div>
  <?php echo form_open_multipart('operator/import_harian_sales') ?>
  <div class="row">
    <div class="col-5">
      <form>
        <?= csrf_field(); ?>
        <div class="form-group">
          <label>File Excel</label>
          <input type="file" name="file_excel" class="form-control-file" required accept=".xls, .xlsx">
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-success">Prosess Import</button>
        </div>
      </form>
    </div>
  </div>
  <?php echo form_close()?>
  <?php
    if(session()->getFlashData('pesan')){
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('pesan') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
    }
  ?>
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
                  <td><input type="date" name="tanggalmin" class="form-control" value="<?= $tanggal['tanggal_min'] ?>" required></td>
                  <td><input type="date" name="tanggalmax" class="form-control" value="<?= $tanggal['tanggal_max'] ?>" required></td>
                  <td>
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
    <div class="col-12">
      <table class="table table-bordered text-center">
        <tr>
          <th>No</th>
          <th>STO</th>
          <th>K-CONTACT</th>
          <th>TYPE LAYANAN</th>
          <th>STATUS RESUME</th>
          <th>GROUP CHANNEL</th>
          <th>TANGGAL ORDER</th>
        </tr>
        <?php
        $n = 1+(10 * ($currentPage - 1));
          foreach ($harian_sales as $k) :?>
              <tr>
                <td><?= $n++ ?></td>
                <td><?= $k['sto']?></td>
                <td><?= $k['kcontact']?></td>
                <td><?= $k['type_layanan']?></td>
                <td><?= $k['status_resume']?></td>
                <td><?= $k['group_channel']?></td>
                <td><?= $k['tanggal_order']?></td>
              </tr>
              <?php endforeach;?>
      </table>
      <?= $pager->links('tb_hariansales', 'table_pagination'); ?>
    </div>
  </div>
</section>
<!-- Import Excel Section End -->
<?= $this->endSection();?>