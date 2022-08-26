<!DOCTYPE html>
<head>
    <title> Car Rental </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Car Rental Agency</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo site_url('dashboard'); ?>">Home <span class="sr-only"></span></a>
      </li>
      <?php 
      if($this->session->userdata('type') == 'agency') {
      ?>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('addcars'); ?>">Add Car Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('bookedcars'); ?>">View Booked Cars</a>
        </li>
      <?php 
      } else if($this->session->userdata('type') == 'customer') {
       ?>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('mybookings'); ?>">My Booked Cars</a>
        </li>
      <?php 
      } else {
      ?>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('login'); ?>">Login</a>
        </li>
        
        <?php
      }
      ?>
      </ul>
      <?php
      if($this->session->has_userdata('id')) {
      ?>
         <div>
          <a class="btn btn-outline-primary my-2 my-sm-0" href="<?php echo site_url('login/logout/'); ?>">Logout</a>
         </div>
      <?php
      }
      ?>
      
    
  </div>
</nav>
</body>

</html>
