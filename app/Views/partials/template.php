<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
		<link rel="stylesheet" href="<?= base_url('css/bootstrap.css');?>">
		<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css');?>">

</head>
<body>

<?= $this->include('partials/navbar');?>

<?= $this->renderSection('content'); ?>

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- custom js file link  -->
<script src="<?= base_url('js/jquery.js');?>"></script>
<script src="<?= base_url('js/popper.js');?>"></script>
<script src="<?= base_url('js/bootstrap.js');?>"></script>
<script src="<?= base_url('js/popper.min.js');?>"></script>
<script src="<?= base_url('js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js');?>"></script>

</body>
</html>