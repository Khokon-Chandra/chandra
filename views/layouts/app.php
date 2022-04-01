<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" constent="<?= csrf_token() ?>">
  <!-- Bootstrap CSS -->
  <title>Multiple Input Search</title>
  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- <link rel="stylesheet" href="<?= asset('css/toastr.min.css') ?>"> -->
</head>

<body>


  <?php include(BASE_URL . '/views/layouts/navbar.php')  ?>

  <div class="container py-4">
    <?= session_flash('success') ? "<div class='alert alert-success'>" . session_flash('success') . "</div>" : '' ?>
    <?= $slot ?>
  </div>


  <script src="<?= asset('js/vendor/jquery.min.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
  <script>
    window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="<?= asset('js/app.js') ?>"></script>
</body>

</html>