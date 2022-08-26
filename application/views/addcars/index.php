<form class="container pt-4 mt-2" method="post" action="/Addcars/add">
  <div class="form-group">
    <label for="Name">Car Name</label>
    <input type="text" class="form-control" name="car_name" required>
  </div>
  <div class="form-group">
    <label for="car_number">Car Number</label>
    <input type="text" class="form-control" name="car_number" required>
  </div>
  <div class="form-group">
    <label for="capacity">Seating Capacity</label>
    <input type="text" class="form-control" name="capacity" required>
  </div>
  <div class="form-group">
    <label for="rent">Rent</label>
    <input type="text" class="form-control" name="rent" required>
  </div>
 <div class="d-flex justify-content-center">
  <button type="Submit" class="btn btn-primary btn-lg">Add to List</button>
 </div>
</form>