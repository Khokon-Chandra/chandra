<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <title>Multisearch</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="<?= asset('css/toastr.min.css') ?>">
</head>

<body>

  <?php include(BASE_URL . '/views/layouts/navbar.php')  ?>

  <div class="container-fluid">
  <?= session_flash('success') ? "<div class='alert alert-success'>". session_flash('success')."</div>" :'' ?>
    <?= $slot ?>
  </div>


  <script src="<?= asset('js/vendor/jquery.min.js') ?>"></script>
  <script src="<?= asset('js/vendor/toastr.min.js') ?>"></script>
  <script src="<?= asset('js/vendor/axios.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>