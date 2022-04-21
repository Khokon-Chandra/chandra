<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?= $pageTitle ?? 'KHOKONC' ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="<?= asset('css/mdb.min.css') ?>" />
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <?= $slot ?>
    </div>
  </div>
  <script type="text/javascript" src="<?= asset('js/vendor/mdb.min.js') ?>"></script>
  <script type="text/javascript" src="<?= asset('js/vendor/axios.min.js') ?>"></script>
  <script type="text/javascript">
    
  </script>
</body>

</html>