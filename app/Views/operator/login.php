<?php $this->extend('partials/template');?>
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