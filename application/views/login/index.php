<form class="container pt-4 mt-2" method="post" action="/login/submit">
  <div class="form-group">
    <label for="Email Address">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="password"  required>
  </div>
 <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary btn-lg">Login</button>
 </div>
</form>
<br>
<hr>
<div class="text text-center">Don't have a account?  <a href="<?php echo site_url('signup'); ?>">
  Sign Up !
</a></div>