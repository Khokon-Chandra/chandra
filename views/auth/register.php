<x-layouts.guest>
<form style="width: 20rem;">
<h4 class="text-center mb-4">Register form</h4>

  <div class="form-outline mb-4">
    <input type="email" id="name" class="form-control" />
    <label class="form-label" for="name">Name</label>
  </div>

  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>



  <button type="submit" class="btn btn-primary btn-block mb-4">Register Now</button>
  <div class="text-center">
    <p>Already has an account? <a href="<?= route('login.create') ?>">Sign in</a></p>
  </div>
</form>
</x-layouts.guest>