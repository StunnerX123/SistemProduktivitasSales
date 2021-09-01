<!-- header section starts  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">
	<img class="img-fluid ml-3" src="<?= base_url('images/logo-indihome.png')?>" width="150" height="150">
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
 
	<div class="collapse navbar-collapse" id="navbarSupportedContent"> 
		<ul class="navbar-nav ml-auto">
			<li class="nav-item ml-5">
				<a class="nav-link text-dark h5" href="<?= base_url('/');?>">Home</a>
			</li>
			<li class="nav-item">
			<div class="dropdown ml-5">
				<a class="nav-link text-dark dropdown-toggle h5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Sales
				</a>
				<div class="dropdown-menu mb-3" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?= base_url('operator/import_excel_datasales'); ?>">Import Data Sales</a>
					<a class="dropdown-item" href="<?= base_url('operator/import_excel_hariansales'); ?>">Import Harian Sales Post</a>
					<hr>
					<a class="dropdown-item" href="<?= base_url('operator/data_resume_agency');?>">Data Resume Agency</a>
					<a class="dropdown-item" href="<?= base_url('operator/data_sto');?>">Data STO</a>
				</div>
			</div>
			</li>
		</ul>

      <!--<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
      </form>-->
	  
	    <a href="<?= base_url('operator/login'); ?>" class="btn btn-outline-dark ml-5 mr-3"><h5>Login</h5></a>
   </div>
</nav>