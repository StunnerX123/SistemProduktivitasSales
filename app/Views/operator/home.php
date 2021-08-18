<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<?= $this->extend('partials/header');?>


<?= $this->section('content');?>
<!-- home section starts   -->
<section class="section gradient-banner">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-dark font-weight-bold mb-4">Selamat Datang</h1>
				<p class="text-dark mb-5">Silahkan Login Terlebih Dahulu Untuk Memulai Mengisi Data Laporan</p>
				<a href="#" class="btn btn-danger">Login</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2 p-5">
				<img class="img-fluid" src="images/telkom-home.png" alt="screenshot" >
			</div>
		</div>
	</div>
</section>
<!-- home section ends -->
<?= $this->endSection();?>

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- custom js file link  -->
<script src="js/jquery.js"></script>
<script src="js/propper.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>