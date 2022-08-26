<div class="container">
<div class="row">
<?php
    foreach($bookings as $booking)
    {
?>
    <div class="col-6 card mt-3 mb-3 mx-auto text-center bg-light" id ="<?=$booking['id'] ?>" style="width: 18rem;">
    <img class="card-img-top" src="/static/car.jpg" alt="Car image">
    <div class="card-body" >
    <h5 class="card-title text-center"><?=$booking['car_model'] ?></h5>
    <div><b>Car Number: </b> <?= $booking['car_number'] ?></div>
    <div> <b> Booking Detials:</b></div>
    <div> <?= $booking['booking_date'] ?> - <?= $booking['booking_enddate'] ?> </div>
    </div>
</div>  
<?php
    }
?>
</div>
</div>