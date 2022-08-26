<div class="container">
<div class="row">
    <div class="col-6 card mt-3 mb-3 mx-auto text-center" id ="<?= $car[0]['id']?>" class="car" style="width: 18rem;">
    <img class="card-img-top" src="/static/car.jpg" alt="Car image">
    <div class="card-body" >
    <h5 class="card-title text-center"><?=$car[0]['model'] ?></h5>
    <div><b>Car Number: </b> <?= $car[0]['number'] ?></div>
    <div><b>Capacity: </b><?= $car[0]['capacity'] ?></div>
    <div><b>Rent: </b><?= $car[0]['rent'] ?></div>
    <?php
    if($this->session->userdata('type') == 'customer')
    ?>
    <br>
    <b> Select No of Days. </b>
    <select name="rent_days" id="rent_days" class="form-control">
        <option selected disabled>--- Choose Rent Days ---</option>
            <?php 
            for($rent_days = 1; $rent_days <= 31; $rent_days++) {
            ?>
                <option value="<?= $rent_days; ?>"><?= $rent_days; ?></option>
            <?php 
            }
            ?>
    </select>
    <b> Choose Date </b>
    <input type="date" name="start_date" id="start_date" min="<?php echo date('Y-m-d'); ?>" class="form-control">
                    
    <br>
    <div class="text-center">
    <button onclick="rent(<?= $car[0]['id'] ?>)" class="btn btn-primary btn-lg btn-align-center">Rent</a>
    </div>
    </div>
</div>  
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function rent(car_id)
    {
        console.log(car_id);
        var rent_days = document.getElementById('rent_days').value;
        var start_date = document.getElementById('start_date').value;
        $.ajax({

            type: 'POST',
            url: "<?php echo site_url('dashboard/rent_car/');?>"+car_id,
            data: {rent_days: rent_days, start_date: start_date},
            beforeSend: function() {},
            success: function(data) {
                console.log(data);
                if(data == 1) {
                
                    alert('Car is booked.');
                    window.location.href = "<?php echo site_url('dashboard'); ?>";
                } else if(data == 0) {
                
                    alert('All fields are mandatory!');
                    window.location.reload();
                }
            },
            error: (error) => {
                     console.log(JSON.stringify(error));
            }
            });
    }
</script>