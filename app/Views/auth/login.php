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

<?php $this->extend('partials/header');?>

<?php $this->section('content');?>
<!-- login section starts -->
<section class="user-login section p-5">
	<div class="container col-md-4">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image text-center"><img class="img-fluid" src="<?= base_url('images/user.png');?>" width="200px" height="200px"
							alt="desk-image"></div>
					<!-- Content -->
					<div class="content text-center">
						<div class="title-text">
							<h3>Silahkan Login</h3>
						</div>
						<form action="#" class="form-group">
							<!-- Username -->
							<input class="form-control mb-2" type="text" placeholder="Username" required>
							<!-- Password -->
							<input class="form-control" type="password" placeholder="Password" required>
							<!-- Submit Button -->
							<div class="container p-3">
								<button class="btn btn-danger">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- login section ends -->
<?php $this->endSection();?>

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