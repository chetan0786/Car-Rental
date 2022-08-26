<form class="container pt-4 mt-2" method="post" action="/Editcar/edit">
<div class="form-group" style="display:none;">
    <input type="text" class="form-control" name="id" value ="<?= $car[0]['id'] ?>" required>
  </div>
  <div class="form-group">
    <label for="Name">Car Name</label>
    <input type="text" class="form-control" name="car_name" value ="<?= $car[0]['model'] ?>" required>
  </div>
  <div class="form-group">
    <label for="car_number">Car Number</label>
    <input type="text" class="form-control" name="car_number" value ="<?= $car[0]['number'] ?>" required>
  </div>
  <div class="form-group">
    <label for="capacity">Seating Capacity</label>
    <input type="text" class="form-control" name="capacity" value ="<?= $car[0]['capacity'] ?>" required>
  </div>
  <div class="form-group">
    <label for="rent">Rent</label>
    <input type="text" class="form-control" name="rent" value ="<?= $car[0]['rent'] ?>" required>
  </div>
 <div class="d-flex justify-content-center">
  <button type="Submit" class="btn btn-primary btn-lg">Edit</button>
 </div>
</form>