<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<!-- Import Excel Section Start -->
<section class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">Import Data Sales</h2>
    </div>
  </div>
  <?php echo form_open_multipart('operator/import_data_sales') ?>
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
  <form action="" method="get">
    <?= csrf_field(); ?>
    <div class="form-row">
      <div class="form-group col-md-3 input-group">
        <input type="text" name="keyword" class="form-control">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <tr class="text-center">
          <th>No</th>
          <th>KODE SALES</th>
          <th>NAMA SALES</th>
          <th>AGENCY</th>
          <th>STATUS SALES</th>
          <th>ACTION</th>
        </tr>
        <?php
        $n = 1+(10 * ($currentPage - 1));
          foreach ($data_sales as $k) :?>
              <tr>
                <td class="text-center"><?= $n++ ?></td>
                <td class="text-center col-2"><?= $k['kode'] ?></td>
                <?php
                  if($k['status']=="Active"){
                ?>
                    <td><?= strtoupper($k['nama_sales']) ?></td>
                    <td class="text-center"><?= strtoupper($k['agency']) ?></td>
                    <td class="bg-success text-light text-center"><?= $k['status'] ?></td>
                <?php
                  } else if($k['status']=="Unknown") {
                ?>
                    <td><?= strtoupper($k['nama_sales']) ?></td>
                    <td class="text-center"><?= strtoupper($k['agency']) ?></td>
                    <td class="bg-warning text-light text-center"><?= $k['status'] ?></td>
                <?php 
                  } else {
                ?>
                    <td><?= strtoupper($k['nama_sales']) ?></td>
                    <td class="text-center"><?= strtoupper($k['agency']) ?></td>
                    <td class="bg-danger text-light text-center"><?= $k['status'] ?></td>
                <?php } ?>
                <td class="text-center">
                  <button type="button" class="btn btn-primary p-0 col-12" data-toggle="modal" data-target="#modal-edit-<?= $k['id_user'] ?>">Edit</button>
                </td>
              </tr>
              <?php endforeach;?>
      </table>
      <?= $pager->links('tb_datasales', 'table_pagination'); ?>
    </div>
  </div>

  <!-- Modal -->
  <?php foreach ($data_sales as $k) :?>
  <div class="modal fade" id="modal-edit-<?= $k['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="<?= base_url('operator/update'); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="float-left" for="id">Id</label>
                <input class="form-control" name="id_user" value="<?= $k['id_user'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="float-left" for="kode">Kode Sales</label>
                <input class="form-control" id="kode" type="text" name="kode" value="<?= $k['kode']; ?>" autofocus>
              </div>
              <div class="form-group">
                <label class="float-left" for="nama">Nama Sales</label>
                <input class="form-control" id="nama" type="text" name="nama_sales" value="<?= $k['nama_sales']; ?>">
              </div>
              <div class="form-group">
                <label class="float-left" for="agency">Agency</label>
                <input class="form-control" id="agency" type="text" name="agency" value="<?= $k['agency']; ?>">
              </div>
              <div class="form-group">
                <label class="float-left" for="status">Status Sales</label>
                <select class="form-control" id="status" name="status" value="<?= $k['status']; ?>">
                  <option>Active</option>
                  <option>Non-Active</option>
                  <option>Unknown</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</section>
<!-- Import Excel Section End -->
<?= $this->endSection();?>