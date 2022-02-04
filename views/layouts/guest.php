<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?= $pageTitle ?></title>
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" /> -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" /> -->
  <link rel="stylesheet" href="<?= asset('css/mdb.min.css') ?>" />
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <?= $slot ?>
    </div>
  </div>
  <script type="text/javascript" src="<?= asset('js/mdb.min.js') ?>"></script>
  <script type="text/javascript" src="<?= asset('js/axios.min.js') ?>"></script>
  <script type="text/javascript">
    //  $(document).ready(function() {
    //       $('#form').submit(function() {
    //           event.preventDefault();
    //           axios.post(this.action, $('#form').serialize(),{ headers: {'X-Requested-With': 'XMLHttpRequest'}}).then((response)=>{
    //               console.log(response.data);
    //           }).catch((error)=>{
    //               console.log(error.response.data);
    //           })
    //       })
    //   })
  </script>
</body>

</html>