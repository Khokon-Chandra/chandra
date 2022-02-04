<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="<?= _token() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= asset('css/mdb.min.css') ?>" />
    <script type="text/javascript" src="<?= asset('js/mdb.min.js') ?>"></script>
    <script src="<?= asset('js/axios.min.js') ?>"></script>
</head>
<body>
<div class="container">
    <?= $slot ?>
</div>
</body>
</html>