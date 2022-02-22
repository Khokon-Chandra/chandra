<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
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
          <a class="nav-link" href="<?= route('news_letter.index') ?>">Newsletter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= route('posts.index') ?>">Posts</a>
        </li>
      </ul>
      <!-- Left links -->
      <div class="mx-5 d-flex align-items-center"><?= $auth->user()['name'] ?></div>
      <div class="d-flex align-items-center">
        <form action="<?= route('login.destroy') ?>" method="POST">
        <?= csrf_token() ?>
        <button type="submit" class="btn btn-primary px-3 me-2">Logout</button>
        </form>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->