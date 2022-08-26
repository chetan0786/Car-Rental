<div class="container">
<div class="row">
<?php
    foreach($allcars as $cars)
    {
?>
    <div class="col-6 card mt-3 mb-3 text-center" id ="<?=$cars['id'] ?>" style="width: 18rem;">
    <img class="card-img-top" src="/static/car.jpg" alt="Car image">
    <div class="card-body" >
    <h5 class="card-title text-center"><?=$cars['model'] ?></h5>
    <div><b>Car Number: </b> <?= $cars['number'] ?></div>
    <div><b>Capacity: </b><?= $cars['capacity'] ?></div>
    <div><b>Rent: </b><?= $cars['rent'] ?></div>
    <?php
    if($this->session->userdata('type') == 'customer') {
    ?>
    <br>
    <div class="text-center">
    <a href="<?php echo site_url('dashboard/book_car/').$cars['id']; ?>" class="btn btn-primary btn-lg btn-align-center">Book</a>
    </div>
    <?php
    }
    else if($this->session->userdata('type') == 'agency') {
    ?>
    <br>
    <div class="text-center">
    <a href="<?php echo site_url('dashboard/edit_car/').$cars['id']; ?>" class="btn btn-primary btn-lg btn-align-center">Edit Info</a>
    </div>
    <?php
    }
    ?>
    </div>
</div>  
<?php
    }
?>
</div>
</div>