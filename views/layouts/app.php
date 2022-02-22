<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="<?= _token() ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom PHP APP</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  
  <link rel="stylesheet" href="<?= asset('css/mdb.min.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/toastr.min.css') ?>" />

  <script type="text/javascript" src="<?= asset('js/vendor/mdb.min.js') ?>"></script>
  <script type="text/javascript" src="<?= asset('js/vendor/jquery.min.js') ?>"></script>
  <script type="text/javascript" src="<?= asset('js/vendor/axios.min.js') ?>"></script>
  <script type="text/javascript" src="<?= asset('js/vendor/toastr.min.js') ?>"></script>
</head>

<body >
  <?php include(BASE_URL . "/views/layouts/navbar.php") ?>

  <div class="container">
    <?= $slot ?>
  </div>

  <script type="text/javascript" src="<?= asset('js/app.js') ?>"></script>
</body>
</html>