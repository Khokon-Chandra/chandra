<x-layouts.guest>
<form class="g-3 needs-validation" method="POST" action="<?= route('register.store') ?>" style="width: 20rem;" novalidate="" >
<h4 class="text-center mb-4">Register form</h4>
  <?= csrf_token() ?>
  <div class="form-outline mb-4">
    <input type="email" name="name" id="name" class="form-control" required />
    <label class="form-label" for="name">Name</label>
    <small class="invalid-feedback d-block mt-1"><?= $error['name'] ?? '' ?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
    <small class="invalid-feedback d-block mt-1"><?= $error['email'] ?? '' ?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="password" name="password" id="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
    <small class="invalid-feedback d-block mt-1"><?= $error['password'] ?? '' ?></small>
  </div>


  <button type="submit" class="btn btn-primary btn-block mb-4">Register Now</button>
  <div class="text-center">
    <p>Already has an account? <a href="<?= route('login.create') ?>">Login</a></p>
  </div>
</form>
</x-layouts.guest>