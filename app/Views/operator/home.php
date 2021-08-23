<?= $this->extend('partials/template');?>


<?= $this->section('content');?>
<!-- home section starts   -->
<section class="section gradient-banner">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-dark font-weight-bold mb-4">Selamat Datang</h1>
				<p class="text-dark mb-5">Silahkan Login Terlebih Dahulu Untuk Memulai Mengisi Data Laporan</p>
				<a href="<?= base_url('operator/login'); ?>" class="btn btn-danger">Login</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2 p-5">
				<img class="img-fluid" src="images/telkom-home.png" alt="screenshot" >
			</div>
		</div>
	</div>
</section>
<!-- home section ends -->
<?= $this->endSection();?>