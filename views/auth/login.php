<x-layouts.guest>
<form method="POST" action="<?= route('login.store') ?>" style="width: 20rem;">
<h4 class="text-center mb-4">Login in Form</h4>
<?= csrf_token() ?>
  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
    <small class="invalid-feedback d-block mt-1"><?= $error['email'] ?? '' ?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>

  <div class="d-flex justify-content-between mb-4">
      <div class="form-check d-flex">
        <input class="form-check-input" name="remember_tocken" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
      <a href="#!">Forgot password?</a>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Login in</button>
  <div class="text-center">
    <p>Not a member? <a href="<?= route('register.create') ?>">Register</a></p>
  </div>
</form>
</x-layouts.guest>