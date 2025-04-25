<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconnect.php');
date_default_timezone_set("Asia/Calcutta");

$studentInfo = $_SESSION['studentData'];

$class_id = $studentInfo['student_class'];

$student_id = $studentInfo['student_id'];

$date = date('Y-m-d');

$tests = $conn->query("select * from tests WHERE class_id = $class_id AND test_date >= '$date' AND tests.test_id NOT IN(select test_resports.test_id from test_resports where student_id=$student_id)");

?>

<div class="list-group">
  <?php foreach($tests as $test) {?>
  <div class="list-group-item list-group-item-action" aria-current="true">
    <b><?php echo $test['test_title'];?></b>
    <b style="margin-left: 100px;"> <?php echo date('d/m/Y', strtotime($test['test_date']));?> &nbsp; <?php echo $test['test_start_time'];?> To <?php echo $test['test_end_time'];?></b>

    <?php

    //Current date+time kiske bich ho exam date + startitme aur endtime

    $startexam_ns = strtotime($test['test_date']. ' '. $test['test_start_time']);

    $endtexam_ns = strtotime($test['test_date']. ' '. $test['test_end_time']);

    $currentns = strtotime(date('Y-m-d H:i:s')); ?>

    <a style="margin-left:90%;" class="btn btn-primary" href="#" onclick="checkValidTime(<?php echo $startexam_ns;?>, <?php echo $endtexam_ns;?>)"> Attempt </a>
    
  </div>
  <?php
  }
  ?>
  
</div>

<?php
include('footer.php');?>

<script>

  function checkValidTime(starttime, endtime) {

    let currentns = Math.floor(new Date().getTime()/1000);

    if(starttime <= currentns && endtime >= currentns) {
        let url = "quiz.php?test_id=<?php echo $test['test_id'];?>&qnum=1";

        window.location.href = url;
    } else {
      alert("Please check exam start and end time. You can attempt test between assigned time!");
    }

  }

</script>