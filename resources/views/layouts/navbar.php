<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="/">
            Site Logo
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('home') ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= route('users.index') ?>">Users</a>
                </li>

            </ul>
            <!-- Left links -->
            <div class="mx-5 d-flex align-items-center"><?= $auth->user()['name'] ?></div>
            <div class="d-flex align-items-center">
                <form action="<?= route('login.destroy') ?>" method="POST">
                    <?= csrf_token() ?>
                    <button type="submit" class="btn btn-primary btn-sm px-3 me-2">Logout</button>
                </form>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->