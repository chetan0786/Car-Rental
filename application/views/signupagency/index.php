<form class="container pt-4 mt-2" method="post" action="/Signup/signupasagency">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" name="address" required>
  </div>
  <div class="form-group">
    <label for="Phone No">Phone No</label>
    <input type="tel" class="form-control" name="phoneno" required>
  </div>
  <!-- <div class="form-group">
    <label for="Type">Type</label>
    <select name="type" name="type" class="form-control" required>
        <option value="customer">Customer</option>
        <option value="agency">Agency</option>
    </select>
  </div> -->
  <div class="form-group">
    <label for="Email Address">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="password"  required>
  </div>
 <div class="d-flex justify-content-center">
  <button type="Submit" class="btn btn-primary btn-lg">Signup</button>
 </div>
</form>



