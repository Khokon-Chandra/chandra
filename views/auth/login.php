<x-layouts.guest>
<form style="width: 20rem;">
<h4 class="text-center mb-4">Sign in Form</h4>

  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <div class="d-flex justify-content-between mb-4">
      <div class="form-check d-flex">
        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
      <a href="#!">Forgot password?</a>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
  <div class="text-center">
    <p>Not a member? <a href="<?= route('register.create') ?>">Register</a></p>
  </div>
</form>
</x-layouts.guest>