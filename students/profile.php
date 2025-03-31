<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconnect.php');

$studentInfo = $_SESSION['studentData'];

?>

<div class="card m-auto text-center" style="width: 30rem;">
  <img src="http://localhost/exportal/assets/images/<?php echo $studentInfo['student_image'];?>" class="card-img-top rounded-circle" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $studentInfo['student_name'];?></h5>
    <p class="card-text"><b> Address : </b> <?Php echo $studentInfo['student_address'];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b> Mobile No. : </b> <?php echo $studentInfo['student_phone'];?></li>
    <li class="list-group-item"><b> Father Name :  </b> <?php echo $studentInfo['student_father'];?></li>
    <li class="list-group-item"><b> Father Phone : </b> <?php echo $studentInfo['father_phone'];?></li>
  </ul>
  <div class="card-body">

    <a href="#" class="card-link">Edit Profile</a>
    
  </div>
</div>

<?php

include('footer.php');