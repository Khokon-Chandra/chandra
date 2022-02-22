<x-layouts.guest>
<form method="POST" action="<?= route('forgot.store') ?>" style="width: 20rem;">
<h4 class="text-center mb-4">Forgot Password</h4>
<?= csrf_token() ?>
  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
    <small class="invalid-feedback d-block mt-1"><?= $error['email'] ?? '' ?></small>
  </div>
 
  <button type="submit" class="btn btn-primary btn-block mb-4">Send Mail</button>
  <div class="text-center">
    <p>Already have an Account ? <a href="<?= route('login.create') ?>">Login</a></p>
  </div>
</form>
</x-layouts.guest>