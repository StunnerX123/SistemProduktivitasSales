<?= $this->extend('partials/template');?>

<?= $this->section('content');?>
<!-- Import Excel Section Start -->
<section class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">Import Data Sales Post</h2>
    </div>
    <?php echo form_open_multipart('operator/import_harian_sales') ?>
    <div class="col-12">
      <form>
        <div class="form-group">
          <label>File Excel</label>
          <input type="file" name="file_excel" class="form-control" required accept=".xls, .xlsx">
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-success">Prosess Import</button>
        </div>
      </form>
    </div>
    <?php echo form_close()?>
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
        $n = 1;
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
    </div>
  </div>
</section>
<!-- Import Excel Section End -->
<?= $this->endSection();?>